<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     * Ensures the authenticated user is an admin (admin or super_admin role)
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!$request->user()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated. Please login as admin.',
            ], 401);
        }

        // Check if user has admin role
        if (!$request->user()->isAdmin()) {
            // Log unauthorized access attempt
            \App\Models\ActivityLog::log(
                $request->user(),
                'admin_auth',
                'unauthorized_access',
                'Non-admin user attempted to access admin routes'
            );

            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Admin access required.',
            ], 403);
        }

        // Check if admin token exists (for API token authentication)
        $isAdminToken = $request->user()->tokens->contains(function ($token) {
            return $token->abilities && in_array('admin', $token->abilities);
        });

        if (!$isAdminToken) {
            // Check token type for SPA authentication
            $hasAdminType = $request->user()->tokens->contains(function ($token) {
                return $token->type === 'admin';
            });

            if (!$hasAdminType) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized. Valid admin token required.',
                ], 403);
            }
        }

        return $next($request);
    }
}
