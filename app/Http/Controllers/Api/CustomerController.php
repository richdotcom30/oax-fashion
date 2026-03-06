<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    /**
     * Register new customer
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Create customer profile
        $user->customer()->create();

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => $user->load('customer'),
            'token' => $token
        ], 201);
    }

    /**
     * Login customer
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => $user->load('customer'),
            'token' => $token
        ]);
    }

    /**
     * Get authenticated user
     */
    public function user(Request $request)
    {
        return response()->json($request->user()->load('customer'));
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'string|max:255',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other,prefer_not_to_say',
        ]);

        $user->update($validated);

        if ($user->customer) {
            $user->customer->update($validated);
        }

        return response()->json($user->load('customer'));
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    /**
     * Admin: List all customers
     */
    public function adminIndex(Request $request)
    {
        $query = User::with('customer');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        if ($request->has('tier')) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('tier', $request->tier);
            });
        }

        $perPage = $request->get('per_page', 20);
        $customers = $query->paginate($perPage);

        return response()->json($customers);
    }

    /**
     * Admin: Get single customer
     */
    public function adminShow($id)
    {
        $user = User::with(['customer', 'orders', 'addresses'])->findOrFail($id);

        return response()->json($user);
    }

    /**
     * Admin: Update customer
     */
    public function adminUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|max:255|unique:users,email,' . $id,
            'tier' => 'in:silver,gold,platinum',
            'loyalty_points' => 'integer|min:0',
        ]);

        $user->update($validated);

        if ($user->customer && isset($validated['tier'])) {
            $user->customer->update(['tier' => $validated['tier']]);
        }

        if ($user->customer && isset($validated['loyalty_points'])) {
            $user->customer->update(['loyalty_points' => $validated['loyalty_points']]);
        }

        return response()->json($user->load('customer'));
    }
}
