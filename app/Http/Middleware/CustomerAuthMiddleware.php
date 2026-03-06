<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuthMiddleware
{
    /**
     * Handle an incoming request.
     * Ensures the authenticated user is a customer (NOT admin)
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!$request->user()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated. Please login.',
            ], 401);
        }

        // Check if user is an admin - block admins from customer routes
        if ($request->user()->isAdmin()) {
            // Log unauthorized access attempt
            \App\Models\ActivityLog::log(
                $request->user(),
                'customer_auth',
                'admin_blocked',
                'Admin user attempted to access customer routes'
            );

            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Admin users cannot access customer areas.',
            ], 403);
        }

        // Check if customer token exists
        $isCustomerToken = $request->user()->tokens->contains(function ($token) {
            return $token->type === 'customer';
        });

        if (!$isCustomerToken) {
            // Also check for customer ability
            $hasCustomerAbility = $request->user()->tokens->contains(function ($token) {
                return $token->abilities && in_array('customer', $token->abilities);
            });

            if (!$hasCustomerAbility) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized. Valid customer token required.',
                ], 403);
            }
        }

        return $next($request);
    }
}
