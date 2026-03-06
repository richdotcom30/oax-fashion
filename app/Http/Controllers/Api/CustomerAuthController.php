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

class CustomerAuthController extends Controller
{
    protected $maxAttempts = 5;
    protected $decayMinutes = 15;
    protected $maxLoginAttempts = 5;
    protected $lockoutMinutes = 30;

    /**
     * Customer Registration
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
        ActivityLog::log($user, 'customer_auth', 'registered', 'Customer registered');

        $token = $user->createToken('customer-token', [
            'type' => 'customer',
        ])->plainTextToken;

        $this->clearLoginAttempts($request);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful. Please verify your email.',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    /**
     * Customer Login - Only allows customer role (blocks admins)
     */
    public function login(Request $request)
    {
        $key = 'customer_login|' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, $this->maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            ActivityLog::log(null, 'customer_auth', 'rate_limited', "Customer rate limited IP: {$request->ip()}");
            
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
            LoginAttempt::record($validated['email'], false, 'customer');
            
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Block admin users from customer login
        if ($user->isAdmin()) {
            $this->incrementLoginAttempts($request);
            ActivityLog::log($user, 'customer_auth', 'admin_blocked', 'Admin user blocked from customer login');
            
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Check if account is locked
        if ($user->locked_until && $user->locked_until->isFuture()) {
            ActivityLog::log($user, 'customer_auth', 'login_locked', 'Customer account is locked');
            
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
                'message' => 'You must change your password before continuing.',
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

        // Successful customer login
        return $this->handleSuccessfulLogin($user, $request, false);
    }

    /**
     * Verify Customer 2FA
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

        // Ensure user is not admin
        if ($user->isAdmin()) {
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

        ActivityLog::log($user, 'customer_auth', '2fa_failed', 'Invalid 2FA code entered');

        return response()->json([
            'success' => false,
            'message' => 'Invalid 2FA code. Please try again.',
        ], 401);
    }

    /**
     * Handle successful customer login
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
        LoginAttempt::record($user->email, true, 'customer');

        // Create customer session token
        $token = $user->createToken('customer-token', [
            'ip' => $request->ip(),
            'user-agent' => $request->userAgent(),
            'type' => 'customer',
        ])->plainTextToken;

        // Log activity
        ActivityLog::log($user, 'customer_auth', 'login', 'Customer logged in' . ($via2FA ? ' via 2FA' : ''));

        // Clear rate limit
        RateLimiter::clear('customer_login|' . $request->ip());

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user' => $user->load('role', 'twoFactorAuth'),
            'token' => $token,
            'redirect_to' => '/account',
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
            
            ActivityLog::log($user, 'customer_auth', 'account_locked', 'Customer account locked due to failed login attempts');
        }

        ActivityLog::log($user, 'customer_auth', 'login_failed', 'Failed customer login attempt');
    }

    /**
     * Increment login attempts
     */
    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit('customer_login|' . $request->ip(), $this->decayMinutes * 60);
    }

    /**
     * Check if too many attempts
     */
    protected function hasTooManyLoginAttempts(Request $request): bool
    {
        return RateLimiter::tooManyAttempts('customer_register|' . $request->ip(), $this->maxAttempts);
    }

    /**
     * Fire lockout event
     */
    protected function fireLockoutEvent(Request $request)
    {
        // Rate limited
    }

    /**
     * Send lockout response
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = RateLimiter::availableIn('customer_register|' . $request->ip());
        
        return response()->json([
            'success' => false,
            'message' => "Too many registration attempts. Please try again in {$seconds} seconds.",
        ], 429);
    }

    /**
     * Clear login attempts
     */
    protected function clearLoginAttempts(Request $request)
    {
        RateLimiter::clear('customer_register|' . $request->ip());
    }

    /**
     * Generate email verification token
     */
    protected function generateEmailVerificationToken(User $user)
    {
        $token = Str::random(64);
        
        \DB::table('email_verification_tokens')->insert([
            'user_id' => $user->id,
            'token' => hash('sha256', $token),
            'expires_at' => now()->addHours(24),
            'created_at' => now(),
        ]);
        
        // In production, send email with verification link
        // Mail::to($user)->send(new VerifyEmail($token));
    }

    /**
     * Customer Logout
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        
        // Delete customer tokens only
        $user->tokens()->where('type', 'customer')->delete();
        
        ActivityLog::log($user, 'customer_auth', 'logout', 'Customer logged out');

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }

    /**
     * Get authenticated customer
     */
    public function user(Request $request)
    {
        $user = $request->user();
        
        // Verify not admin
        if ($user->isAdmin()) {
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
     * Check if customer session is valid
     */
    public function check(Request $request)
    {
        $user = $request->user();
        
        if (!$user || $user->isAdmin()) {
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
