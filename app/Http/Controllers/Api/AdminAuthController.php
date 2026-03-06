<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\LoginAttempt;
use App\Models\TwoFactorAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use PragmaRX\Google2FA\Google2FA;
use App\Rules\CaptchaValidation;

class AdminAuthController extends Controller
{
    protected $maxAttempts = 5;
    protected $decayMinutes = 15;
    protected $maxLoginAttempts = 5;
    protected $lockoutMinutes = 30;

    /**
     * Admin Login - Only allows admin and super_admin roles
     */
    public function login(Request $request)
    {
        $key = 'admin_login|' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, $this->maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            ActivityLog::log(null, 'admin_auth', 'rate_limited', "Admin rate limited IP: {$request->ip()}");
            
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
            LoginAttempt::record($validated['email'], false, 'admin');
            
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Verify this user has admin role
        if (!$user->isAdmin()) {
            $this->incrementLoginAttempts($request);
            ActivityLog::log($user, 'admin_auth', 'unauthorized_access', 'Non-admin user attempted admin login');
            
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Check if account is locked
        if ($user->locked_until && $user->locked_until->isFuture()) {
            ActivityLog::log($user, 'admin_auth', 'login_locked', 'Admin account is locked');
            
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

        // Check if password needs to be changed
        if ($user->force_password_change) {
            return response()->json([
                'success' => true,
                'requires_password_change' => true,
                'message' => 'You must change your password before accessing the admin panel.',
            ], 200);
        }

        // Check if 2FA is enabled
        $twoFactorAuth = TwoFactorAuth::where('user_id', $user->id)->where('enabled', true)->first();
        
        if ($twoFactorAuth) {
            $tempToken = Str::random(64);
            $user->update(['captcha_key' => $tempToken]);
            
            RateLimiter::clear($key);
            
            return response()->json([
                'success' => true,
                'requires_2fa' => true,
                'temp_token' => $tempToken,
                'message' => 'Please enter your 2FA code',
            ], 200);
        }

        // Successful admin login
        return $this->handleSuccessfulLogin($user, $request, false);
    }

    /**
     * Verify Admin 2FA
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

        // Ensure user is admin
        if (!$user->isAdmin()) {
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
            $user->update(['captcha_key' => null]);
            return $this->handleSuccessfulLogin($user, $request, true);
        }

        // Try backup code
        if ($twoFactorAuth->verifyBackupCode($validated['code'])) {
            $user->update(['captcha_key' => null]);
            return $this->handleSuccessfulLogin($user, $request, true);
        }

        ActivityLog::log($user, 'admin_auth', '2fa_failed', 'Invalid 2FA code entered');

        return response()->json([
            'success' => false,
            'message' => 'Invalid 2FA code. Please try again.',
        ], 401);
    }

    /**
     * Handle successful admin login
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
        LoginAttempt::record($user->email, true, 'admin');

        // Create admin session token
        $token = $user->createToken('admin-token', [
            'ip' => $request->ip(),
            'user-agent' => $request->userAgent(),
            'type' => 'admin',
        ])->plainTextToken;

        // Log activity
        ActivityLog::log($user, 'admin_auth', 'login', 'Admin logged in' . ($via2FA ? ' via 2FA' : ''));

        // Clear rate limit
        RateLimiter::clear('admin_login|' . $request->ip());

        return response()->json([
            'success' => true,
            'message' => 'Admin login successful',
            'user' => $user->load('role', 'twoFactorAuth'),
            'token' => $token,
            'redirect_to' => '/admin',
        ]);
    }

    /**
     * Handle failed login
     */
    protected function handleFailedLogin(User $user)
    {
        $user->increment('failed_login_attempts');
        
        if ($user->failed_login_attempts >= $this->maxLoginAttempts) {
            $user->update([
                'locked_until' => now()->addMinutes($this->lockoutMinutes),
            ]);
            
            ActivityLog::log($user, 'admin_auth', 'account_locked', 'Admin account locked due to failed login attempts');
        }

        ActivityLog::log($user, 'admin_auth', 'login_failed', 'Failed admin login attempt');
    }

    /**
     * Increment login attempts
     */
    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit('admin_login|' . $request->ip(), $this->decayMinutes * 60);
    }

    /**
     * Admin Logout
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        
        // Delete admin tokens only
        $user->tokens()->where('type', 'admin')->delete();
        
        ActivityLog::log($user, 'admin_auth', 'logout', 'Admin logged out');

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }

    /**
     * Get authenticated admin
     */
    public function user(Request $request)
    {
        $user = $request->user();
        
        // Verify admin status
        if (!$user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }
        
        return response()->json([
            'success' => true,
            'user' => $user->load('role', 'twoFactorAuth'),
        ]);
    }

    /**
     * Check if admin session is valid
     */
    public function check(Request $request)
    {
        $user = $request->user();
        
        if (!$user || !$user->isAdmin()) {
            return response()->json([
                'success' => false,
                'authenticated' => false,
            ], 401);
        }
        
        return response()->json([
            'success' => true,
            'authenticated' => true,
            'user' => $user,
        ]);
    }
}
