<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Checks if the user has the required role or permission.
     */
    public function handle(Request $request, Closure $next, string $roleOrPermission): Response
    {
        $user = $request->user();

        // Check if user is authenticated
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated',
            ], 401);
        }

        // Check if account is active
        if (!$user->is_active) {
            ActivityLog::log($user, 'auth', 'access_denied_inactive', 'Inactive user attempted to access protected route');
            
            return response()->json([
                'success' => false,
                'message' => 'Your account has been deactivated.',
            ], 403);
        }

        // Determine if checking role or permission
        $checkPermission = str_contains($roleOrPermission, 'permission:');
        
        if ($checkPermission) {
            $permission = str_replace('permission:', '', $roleOrPermission);
            
            if (!$user->hasPermission($permission)) {
                ActivityLog::log($user, 'auth', 'access_denied', "Access denied: missing permission {$permission}");
                
                return response()->json([
                    'success' => false,
                    'message' => 'You do not have permission to perform this action.',
                ], 403);
            }
        } else {
            // Check role
            if (!$user->hasRole($roleOrPermission)) {
                ActivityLog::log($user, 'auth', 'access_denied', "Access denied: missing role {$roleOrPermission}");
                
                return response()->json([
                    'success' => false,
                    'message' => 'You do not have the required role.',
                ], 403);
            }
        }

        return $next($request);
    }
}
