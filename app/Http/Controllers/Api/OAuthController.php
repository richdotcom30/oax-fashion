<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\OAuthProvider;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    /**
     * Redirect to OAuth provider
     */
    public function redirectToProvider(string $provider)
    {
        $validProviders = ['google', 'facebook', 'instagram'];
        
        if (!in_array($provider, $validProviders)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OAuth provider',
            ], 400);
        }

        return response()->json([
            'success' => true,
            'redirect_url' => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl(),
        ]);
    }

    /**
     * Handle OAuth callback
     */
    public function handleProviderCallback(string $provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication failed. Please try again.',
            ], 422);
        }

        // Find or create user
        $oauthProvider = OAuthProvider::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        if ($oauthProvider) {
            // User already linked this provider
            $user = $oauthProvider->user;
        } else {
            // Check if user exists with same email
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                // Link existing user to OAuth provider
                OAuthProvider::create([
                    'user_id' => $user->id,
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'access_token' => $socialUser->token,
                    'refresh_token' => $socialUser->refreshToken,
                    'expires_at' => now()->addSeconds($socialUser->expiresIn),
                    'provider_data' => [
                        'avatar' => $socialUser->getAvatar(),
                        'nickname' => $socialUser->getNickname(),
                    ],
                ]);

                ActivityLog::log($user, 'oauth', 'provider_linked', "Linked {$provider} account");
            } else {
                // Create new user
                $user = User::create([
                    'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
                    'email' => $socialUser->getEmail(),
                    'email_verified_at' => now(), // OAuth emails are verified
                    'password' => Hash::make(Str::random(32)), // Random password
                ]);

                // Assign customer role
                $customerRole = \App\Models\Role::where('slug', 'customer')->first();
                if ($customerRole) {
                    $user->role_id = $customerRole->id;
                    $user->save();
                }

                // Create OAuth provider
                OAuthProvider::create([
                    'user_id' => $user->id,
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'access_token' => $socialUser->token,
                    'refresh_token' => $socialUser->refreshToken,
                    'expires_at' => now()->addSeconds($socialUser->expiresIn),
                    'provider_data' => [
                        'avatar' => $socialUser->getAvatar(),
                        'nickname' => $socialUser->getNickname(),
                    ],
                ]);

                ActivityLog::log($user, 'oauth', 'registered_via_oauth', "Registered via {$provider}");
            }
        }

        // Generate token
        $token = $user->createToken('auth-token', [
            'ip' => request()->ip(),
            'user-agent' => request()->userAgent(),
        ])->plainTextToken;

        ActivityLog::log($user, 'oauth', 'login', "Logged in via {$provider}");

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user' => $user->load('role', 'oauthProviders'),
            'token' => $token,
        ]);
    }

    /**
     * Link OAuth provider to existing account
     */
    public function linkProvider(Request $request, string $provider)
    {
        $validProviders = ['google', 'facebook', 'instagram'];
        
        if (!in_array($provider, $validProviders)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OAuth provider',
            ], 400);
        }

        // Check if already linked
        $existing = OAuthProvider::where('user_id', $request->user()->id)
            ->where('provider', $provider)
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => "This account is already linked to {$provider}",
            ], 400);
        }

        return response()->json([
            'success' => true,
            'redirect_url' => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl(),
        ]);
    }

    /**
     * Unlink OAuth provider
     */
    public function unlinkProvider(Request $request, string $provider)
    {
        $oauthProvider = OAuthProvider::where('user_id', $request->user()->id)
            ->where('provider', $provider)
            ->first();

        if (!$oauthProvider) {
            return response()->json([
                'success' => false,
                'message' => "This account is not linked to {$provider}",
            ], 400);
        }

        // Check if user has password (should have at least one login method)
        if (!$request->user()->password && OAuthProvider::where('user_id', $request->user()->id)->count() <= 1) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot unlink. You need at least one login method.',
            ], 400);
        }

        $oauthProvider->delete();

        ActivityLog::log($request->user(), 'oauth', 'provider_unlinked', "Unlinked {$provider} account");

        return response()->json([
            'success' => true,
            'message' => "{$provider} account has been unlinked.",
        ]);
    }

    /**
     * Get linked OAuth providers
     */
    public function linkedProviders(Request $request)
    {
        $providers = OAuthProvider::where('user_id', $request->user()->id)
            ->select('id', 'provider', 'provider_data', 'created_at')
            ->get()
            ->map(function ($p) {
                return [
                    'id' => $p->id,
                    'provider' => $p->provider,
                    'connected_at' => $p->created_at,
                    'avatar' => $p->provider_data['avatar'] ?? null,
                ];
            });

        return response()->json([
            'success' => true,
            'providers' => $providers,
        ]);
    }
}
