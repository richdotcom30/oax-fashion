<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\LoginAttempt;
use App\Models\TwoFactorAuth;
use App\Models\OAuthProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Rules\CaptchaValidation;
use PragmaRX\Google2FA\Google2FA;

class AuthController extends Controller
{
    protected $maxAttempts = 5;
    protected $decayMinutes = 15;
    protected $maxLoginAttempts = 5;
    protected $lockoutMinutes = 30;

    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        // Rate limiting
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            'g-recaptcha-response' => ['sometimes', new CaptchaValidation()],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Assign customer role
        $customerRole = \App\Models\Role::where('slug', 'customer')->first();
        if ($customerRole) {
            $user->role_id = $customerRole->id;
            $user->save();
        }

        // Generate email verification token
        $this->generateEmailVerificationToken($user);

        // Log activity
        ActivityLog::log($user, 'auth', 'registered', 'User registered');

        $token = $user->createToken('auth-token')->plainTextToken;

        $this->clearLoginAttempts($request);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful. Please verify your email.',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    /**
     * Login user with enhanced security
     */
    public function login(Request $request)
    {
        // Rate limiting
        $key = 'login|' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, $this->maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            ActivityLog::log(null, 'auth', 'rate_limited', "Rate limited IP: {$request->ip()}");
            
            return response()->json([
                'success' => false,
                'message' => "Too many login attempts. Please try again in {$seconds} seconds.",
                'retry_after' => $seconds,
            ], 429);
        }

        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'g-recaptcha-response' => ['sometimes', new CaptchaValidation()],
        ]);

        $user = User::where('email', $validated['email'])->first();

        // Check if user exists
        if (!$user) {
            $this->incrementLoginAttempts($request);
            LoginAttempt::record($validated['email'], false);
            
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Check if account is locked
        if ($user->locked_until && $user->locked_until->isFuture()) {
            ActivityLog::log($user, 'auth', 'login_locked', 'Account is locked', null, null, [
                'locked_until' => $user->locked_until,
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Account is locked. Please try again later.',
                'locked_until' => $user->locked_until,
            ], 423);
        }

        // Verify password
        if (!Hash::check($validated['password'], $user->password)) {
            $this->incrementLoginAttempts($request);
            $this->handleFailedLogin($user);
            
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Check if password needs to be changed (force password change)
        if ($user->force_password_change) {
            return response()->json([
                'success' => true,
                'requires_password_change' => true,
                'message' => 'You must change your password before continuing.',
            ], 200);
        }

        // Check if 2FA is enabled
        $twoFactorAuth = TwoFactorAuth::where('user_id', $user->id)->where('enabled', true)->first();
        
        if ($twoFactorAuth) {
            // Generate temp token for 2FA verification
            $tempToken = Str::random(64);
            $user->update(['captcha_key' => $tempToken]); // Reuse field for temp token
            
            RateLimiter::clear($key);
            
            return response()->json([
                'success' => true,
                'requires_2fa' => true,
                'temp_token' => $tempToken,
                'message' => 'Please enter your 2FA code',
            ], 200);
        }

        // Successful login without 2FA
        return $this->handleSuccessfulLogin($user, $request, false);
    }

    /**
     * Verify 2FA code
     */
    public function verify2FA(Request $request)
    {
        $validated = $request->validate([
            'temp_token' => 'required|string',
            'code' => 'required|string',
        ]);

        $user = User::where('captcha_key', $validated['temp_token'])->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid session. Please login again.',
            ], 401);
        }

        $twoFactorAuth = TwoFactorAuth::where('user_id', $user->id)->where('enabled', true)->first();

        if (!$twoFactorAuth) {
            return response()->json([
                'success' => false,
                'message' => '2FA is not enabled for this account.',
            ], 400);
        }

        // Try TOTP code first
        if ($twoFactorAuth->verifyCode($validated['code'])) {
            // Clear temp token
            $user->update(['captcha_key' => null]);
            return $this->handleSuccessfulLogin($user, $request, true);
        }

        // Try backup code
        if ($twoFactorAuth->verifyBackupCode($validated['code'])) {
            $user->update(['captcha_key' => null]);
            return $this->handleSuccessfulLogin($user, $request, true);
        }

        // Invalid code
        ActivityLog::log($user, 'auth', '2fa_failed', 'Invalid 2FA code entered');

        return response()->json([
            'success' => false,
            'message' => 'Invalid 2FA code. Please try again.',
        ], 401);
    }

    /**
     * Handle successful login
     */
    protected function handleSuccessfulLogin(User $user, Request $request, bool $via2FA)
    {
        // Clear lockout and failed attempts
        $user->update([
            'failed_login_attempts' => 0,
            'locked_until' => null,
            'last_login_at' => now(),
            'last_login_ip' => $request->ip(),
            'captcha_key' => null,
        ]);

        // Record successful login
        LoginAttempt::record($user->email, true);

        // Create session record
        $this->createUserSession($user, $request);

        // Generate token
        $token = $user->createToken('auth-token', [
            'ip' => $request->ip(),
            'user-agent' => $request->userAgent(),
        ])->plainTextToken;

        // Log activity
        ActivityLog::log($user, 'auth', 'login', 'User logged in' . ($via2FA ? ' via 2FA' : ''));

        // Clear rate limit
        RateLimiter::clear('login|' . $request->ip());

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user' => $user->load('role', 'twoFactorAuth'),
            'token' => $token,
        ]);
    }

    /**
     * Handle failed login
     */
    protected function handleFailedLogin(User $user)
    {
        $user->increment('failed_login_attempts');
        
        // Lock account after max attempts
        if ($user->failed_login_attempts >= $this->maxLoginAttempts) {
            $user->update([
                'locked_until' => now()->addMinutes($this->lockoutMinutes),
            ]);
            
            ActivityLog::log($user, 'auth', 'account_locked', 'Account locked due to failed login attempts');
        }

        ActivityLog::log($user, 'auth', 'login_failed', 'Failed login attempt');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        
        // Delete current token
        $request->user()->currentAccessToken()->delete();
        
        // Delete session record
        \DB::table('user_sessions')
            ->where('user_id', $user->id)
            ->where('is_current', true)
            ->delete();
        
        // Log activity
        ActivityLog::log($user, 'auth', 'logout', 'User logged out');

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }

    /**
     * Logout from all devices
     */
    public function logoutAll(Request $request)
    {
        $user = $request->user();
        
        // Delete all tokens
        $user->tokens()->delete();
        
        // Delete all sessions
        \DB::table('user_sessions')
            ->where('user_id', $user->id)
            ->delete();
        
        // Log activity
        ActivityLog::log($user, 'auth', 'logout_all', 'User logged out from all devices');

        return response()->json([
            'success' => true,
            'message' => 'Logged out from all devices successfully',
        ]);
    }

    /**
     * Get authenticated user
     */
    public function user(Request $request)
    {
        $user = $request->user()->load('role', 'twoFactorAuth', 'oauthProviders');
        
        return response()->json([
            'success' => true,
            'user' => $user,
            'sessions' => $this->getUserSessions($user),
        ]);
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:20',
        ]);

        $oldValues = $user->toArray();
        $user->update($validated);
        
        ActivityLog::log($user, 'auth', 'profile_updated', 'Profile updated', $user, $oldValues, $user->toArray());

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => $user->fresh(),
        ]);
    }

    /**
     * Change password
     */
    public function changePassword(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect',
            ], 422);
        }

        // Check password history (prevent reusing last 5 passwords)
        $passwordHistory = $user->password_history ? json_decode($user->password_history, true) : [];
        
        foreach ($passwordHistory as $oldHash) {
            if (Hash::check($validated['password'], $oldHash)) {
                return response()->json([
                    'success' => false,
                    'message' => 'You cannot reuse any of your last 5 passwords.',
                ], 422);
            }
        }

        // Add current password to history
        $passwordHistory[] = $user->password;
        if (count($passwordHistory) > 5) {
            array_shift($passwordHistory);
        }

        $user->update([
            'password' => Hash::make($validated['password']),
            'password_history' => json_encode($passwordHistory),
            'force_password_change' => false,
        ]);

        // Revoke all other tokens
        $user->tokens()->where('id', '!=', $user->currentAccessToken()->id)->delete();

        ActivityLog::log($user, 'auth', 'password_changed', 'Password changed');

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully',
        ]);
    }

    /**
     * Request password reset
     */
    public function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            $token = Str::random(64);
            $tokenHash = hash('sha256', $token);
            
            \DB::table('password_reset_tokens')->insert([
                'user_id' => $user->id,
                'token' => $token,
                'token_hash' => $tokenHash,
                'type' => 'password_reset',
                'expires_at' => now()->addHours(1),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'created_at' => now(),
            ]);

            // In production, send email here
            // Mail::to($user)->send(new PasswordResetMail($token));
            
            ActivityLog::log($user, 'auth', 'password_reset_requested', 'Password reset requested');
        }

        // Always return success to prevent email enumeration
        return response()->json([
            'success' => true,
            'message' => 'If that email exists, we have sent a password reset link.',
            // Remove in production:
            'debug_token' => $token ?? null,
        ]);
    }

    /**
     * Reset password
     */
    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
        ]);

        $tokenRecord = \DB::table('password_reset_tokens')
            ->where('token', $validated['token'])
            ->where('email', $validated['email'])
            ->where('type', 'password_reset')
            ->where('expires_at', '>', now())
            ->whereNull('used_at')
            ->first();

        if (!$tokenRecord) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired token',
            ], 422);
        }

        $user = User::find($tokenRecord->user_id);

        // Check password history
        $passwordHistory = $user->password_history ? json_decode($user->password_history, true) : [];
        
        foreach ($passwordHistory as $oldHash) {
            if (Hash::check($validated['password'], $oldHash)) {
                return response()->json([
                    'success' => false,
                    'message' => 'You cannot reuse any of your last 5 passwords.',
                ], 422);
            }
        }

        // Add current password to history
        $passwordHistory[] = $user->password;
        if (count($passwordHistory) > 5) {
            array_shift($passwordHistory);
        }

        $user->update([
            'password' => Hash::make($validated['password']),
            'password_history' => json_encode($passwordHistory),
            'failed_login_attempts' => 0,
            'locked_until' => null,
        ]);

        // Mark token as used
        \DB::table('password_reset_tokens')
            ->where('id', $tokenRecord->id)
            ->update([
                'used_at' => now(),
            ]);

        // Revoke all tokens
        $user->tokens()->delete();

        ActivityLog::log($user, 'auth', 'password_reset', 'Password has been reset');

        return response()->json([
            'success' => true,
            'message' => 'Password has been reset successfully. Please login with your new password.',
        ]);
    }

    /**
     * Verify email
     */
    public function verifyEmail(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required|string',
        ]);

        $tokenRecord = \DB::table('password_reset_tokens')
            ->where('token', $validated['token'])
            ->where('type', 'email_verification')
            ->whereNull('used_at')
            ->first();

        if (!$tokenRecord) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired verification token',
            ], 422);
        }

        $user = User::find($tokenRecord->user_id);
        $user->update([
            'email_verified_at' => now(),
        ]);

        \DB::table('password_reset_tokens')
            ->where('id', $tokenRecord->id)
            ->update(['used_at' => now()]);

        ActivityLog::log($user, 'auth', 'email_verified', 'Email verified');

        return response()->json([
            'success' => true,
            'message' => 'Email verified successfully',
        ]);
    }

    /**
     * Enable 2FA
     */
    public function enable2FA(Request $request)
    {
        $user = $request->user();
        
        $google2fa = new Google2FA();
        $secret = $google2fa->generateSecretKey();

        // Store temporary secret
        $twoFactorAuth = TwoFactorAuth::updateOrCreate(
            ['user_id' => $user->id],
            [
                'secret' => $secret,
                'enabled' => false,
                'verified' => false,
            ]
        );

        // Generate QR code URL
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secret
        );

        return response()->json([
            'success' => true,
            'secret' => $secret,
            'qr_code_url' => $qrCodeUrl,
            'message' => 'Please scan the QR code with your authenticator app and verify with a code.',
        ]);
    }

    /**
     * Verify and enable 2FA
     */
    public function confirm2FA(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'code' => 'required|string',
        ]);

        $twoFactorAuth = TwoFactorAuth::where('user_id', $user->id)->first();

        if (!$twoFactorAuth) {
            return response()->json([
                'success' => false,
                'message' => 'Please initiate 2FA setup first.',
            ], 400);
        }

        $google2fa = new Google2FA();
        
        if (!$google2fa->verifyKey($twoFactorAuth->secret, $validated['code'])) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid code. Please try again.',
            ], 422);
        }

        // Generate backup codes
        $backupCodes = [];
        for ($i = 0; $i < 10; $i++) {
            $backupCodes[] = strtoupper(Str::random(8));
        }

        $twoFactorAuth->update([
            'enabled' => true,
            'verified' => true,
            'enabled_at' => now(),
            'backup_codes' => array_map(fn($code) => bcrypt($code), $backupCodes),
        ]);

        ActivityLog::log($user, 'auth', '2fa_enabled', 'Two-factor authentication enabled');

        return response()->json([
            'success' => true,
            'message' => 'Two-factor authentication enabled successfully.',
            'backup_codes' => $backupCodes,
        ]);
    }

    /**
     * Disable 2FA
     */
    public function disable2FA(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'password' => 'required|string',
            'code' => 'required|string',
        ]);

        if (!Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password.',
            ], 422);
        }

        $twoFactorAuth = TwoFactorAuth::where('user_id', $user->id)->first();

        if (!$twoFactorAuth || !$twoFactorAuth->enabled) {
            return response()->json([
                'success' => false,
                'message' => '2FA is not enabled.',
            ], 400);
        }

        // Verify code
        if (!$twoFactorAuth->verifyCode($validated['code']) && !$twoFactorAuth->verifyBackupCode($validated['code'])) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid code.',
            ], 422);
        }

        $twoFactorAuth->delete();

        ActivityLog::log($user, 'auth', '2fa_disabled', 'Two-factor authentication disabled');

        return response()->json([
            'success' => true,
            'message' => 'Two-factor authentication disabled.',
        ]);
    }

    /**
     * Get user sessions
     */
    public function sessions(Request $request)
    {
        return response()->json([
            'success' => true,
            'sessions' => $this->getUserSessions($request->user()),
        ]);
    }

    /**
     * Terminate a session
     */
    public function terminateSession(Request $request, $sessionId)
    {
        $session = \DB::table('user_sessions')
            ->where('id', $sessionId)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$session) {
            return response()->json([
                'success' => false,
                'message' => 'Session not found.',
            ], 404);
        }

        \DB::table('user_sessions')->where('id', $sessionId)->delete();

        ActivityLog::log($request->user(), 'auth', 'session_terminated', "Session terminated: {$sessionId}");

        return response()->json([
            'success' => true,
            'message' => 'Session terminated successfully.',
        ]);
    }

    /**
     * Refresh token
     */
    public function refresh(Request $request)
    {
        $user = $request->user();
        
        // Delete current token
        $user->currentAccessToken()->delete();
        
        // Create new token
        $token = $user->createToken('auth-token', [
            'ip' => $request->ip(),
            'user-agent' => $request->userAgent(),
        ])->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    // Helper methods

    protected function hasTooManyLoginAttempts(Request $request): bool
    {
        return RateLimiter::tooManyAttempts('login|' . $request->ip(), $this->maxAttempts);
    }

    protected function incrementLoginAttempts(Request $request): void
    {
        RateLimiter::hit('login|' . $request->ip(), $this->decayMinutes * 60);
    }

    protected function clearLoginAttempts(Request $request): void
    {
        RateLimiter::clear('login|' . $request->ip());
    }

    protected function fireLockoutEvent(Request $request): void
    {
        ActivityLog::log(null, 'auth', 'lockout', "IP locked out: {$request->ip()}");
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = RateLimiter::availableIn('login|' . $request->ip());
        
        return response()->json([
            'success' => false,
            'message' => "Too many login attempts. Please try again in {$seconds} seconds.",
            'retry_after' => $seconds,
        ], 429);
    }

    protected function createUserSession(User $user, Request $request): void
    {
        // Mark all sessions as not current
        \DB::table('user_sessions')
            ->where('user_id', $user->id)
            ->update(['is_current' => false]);

        // Create new session
        \DB::table('user_sessions')->insert([
            'user_id' => $user->id,
            'session_id' => Str::uuid()->toString(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'device_type' => $this->getDeviceType($request->userAgent()),
            'browser' => $this->getBrowser($request->userAgent()),
            'platform' => $this->getPlatform($request->userAgent()),
            'is_current' => true,
            'last_activity' => now(),
            'created_at' => now(),
        ]);
    }

    protected function getUserSessions(User $user): array
    {
        return \DB::table('user_sessions')
            ->where('user_id', $user->id)
            ->orderBy('last_activity', 'desc')
            ->limit(10)
            ->get()
            ->toArray();
    }

    protected function generateEmailVerificationToken(User $user): void
    {
        $token = Str::random(64);
        
        \DB::table('password_reset_tokens')->insert([
            'user_id' => $user->id,
            'token' => $token,
            'token_hash' => hash('sha256', $token),
            'type' => 'email_verification',
            'expires_at' => now()->addDays(7),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'created_at' => now(),
        ]);
    }

    protected function getDeviceType(string $userAgent): string
    {
        if (preg_match('/mobile/i', $userAgent)) {
            return 'mobile';
        } elseif (preg_match('/tablet/i', $userAgent)) {
            return 'tablet';
        }
        return 'desktop';
    }

    protected function getBrowser(string $userAgent): string
    {
        if (preg_match('/chrome/i', $userAgent)) {
            return 'Chrome';
        } elseif (preg_match('/firefox/i', $userAgent)) {
            return 'Firefox';
        } elseif (preg_match('/safari/i', $userAgent)) {
            return 'Safari';
        } elseif (preg_match('/edge/i', $userAgent)) {
            return 'Edge';
        }
        return 'Unknown';
    }

    protected function getPlatform(string $userAgent): string
    {
        if (preg_match('/windows/i', $userAgent)) {
            return 'Windows';
        } elseif (preg_match('/mac/i', $userAgent)) {
            return 'macOS';
        } elseif (preg_match('/linux/i', $userAgent)) {
            return 'Linux';
        } elseif (preg_match('/android/i', $userAgent)) {
            return 'Android';
        } elseif (preg_match('/ios|iphone|ipad/i', $userAgent)) {
            return 'iOS';
        }
        return 'Unknown';
    }
}
