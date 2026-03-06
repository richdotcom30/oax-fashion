<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\CustomerAuthController;
use App\Http\Controllers\Api\OAuthController;

/*
|--------------------------------------------------------------------------
| API Routes - Segregated Authentication System
|--------------------------------------------------------------------------
|
| Routes are separated into three groups:
| 1. Public Routes - Available to everyone
| 2. Customer Routes - /account prefix, requires customer role
| 3. Admin Routes - /admin prefix, requires admin/super_admin role
|
*/

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::prefix('v1')->group(function () {
    // ===== Customer Authentication =====
    Route::post('/auth/register', [CustomerAuthController::class, 'register']);
    Route::post('/auth/login', [CustomerAuthController::class, 'login']);
    Route::post('/auth/verify-2fa', [CustomerAuthController::class, 'verify2FA']);
    Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/auth/reset-password', [AuthController::class, 'resetPassword']);
    Route::post('/auth/verify-email', [AuthController::class, 'verifyEmail']);
    
    // ===== Admin Authentication =====
    Route::post('/admin/auth/login', [AdminAuthController::class, 'login']);
    Route::post('/admin/auth/verify-2fa', [AdminAuthController::class, 'verify2FA']);
    
    // ===== OAuth =====
    Route::get('/auth/oauth/{provider}', [OAuthController::class, 'redirectToProvider']);
    Route::get('/auth/oauth/{provider}/callback', [OAuthController::class, 'handleProviderCallback']);
    
    // ===== Public Products =====
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{slug}', [ProductController::class, 'show']);
    Route::get('/products/featured', [ProductController::class, 'featured']);
    
    // ===== Categories =====
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{slug}', [CategoryController::class, 'show']);
});

/*
|--------------------------------------------------------------------------
| Customer Routes (/account) - Requires Customer Token
|--------------------------------------------------------------------------
| These routes are for regular customers.
| Admins are BLOCKED from accessing these routes.
*/
Route::prefix('v1/account')->middleware('customer.auth')->group(function () {
    // User Profile
    Route::get('/user', [CustomerAuthController::class, 'user']);
    Route::put('/user/profile', [AuthController::class, 'updateProfile']);
    
    // Authentication
    Route::post('/auth/logout', [CustomerAuthController::class, 'logout']);
    Route::post('/auth/change-password', [AuthController::class, 'changePassword']);
    
    // 2FA
    Route::post('/auth/2fa/enable', [AuthController::class, 'enable2FA']);
    Route::post('/auth/2fa/confirm', [AuthController::class, 'confirm2FA']);
    Route::post('/auth/2fa/disable', [AuthController::class, 'disable2FA']);
    
    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::put('/cart/update/{id}', [CartController::class, 'update']);
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove']);
    Route::delete('/cart/clear', [CartController::class, 'clear']);
    
    // Checkout
    Route::post('/checkout', [CheckoutController::class, 'process']);
    Route::get('/checkout/status/{orderId}', [CheckoutController::class, 'status']);
    
    // Orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel']);
    
    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist/add', [WishlistController::class, 'add']);
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove']);
    
    // Customer Profile
    Route::get('/profile', [CustomerController::class, 'show']);
    Route::put('/profile', [CustomerController::class, 'update']);
});

/*
|--------------------------------------------------------------------------
| Admin Routes (/admin) - Requires Admin Token
|--------------------------------------------------------------------------
| These routes are for administrators only.
| Regular customers are BLOCKED from accessing these routes.
*/
Route::prefix('v1/admin')->middleware('admin.auth')->group(function () {
    // Admin Profile
    Route::get('/user', [AdminAuthController::class, 'user']);
    Route::post('/auth/logout', [AdminAuthController::class, 'logout']);
    
    // Dashboard
    Route::get('/dashboard/stats', [ProductController::class, 'dashboardStats']);
    Route::get('/dashboard/revenue', [ProductController::class, 'revenueStats']);
    
    // Products Management
    Route::get('/products', [ProductController::class, 'adminIndex']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/products/{id}/duplicate', [ProductController::class, 'duplicate']);
    
    // Categories Management
    Route::get('/categories', [CategoryController::class, 'adminIndex']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
    
    // Orders Management
    Route::get('/orders', [OrderController::class, 'adminIndex']);
    Route::get('/orders/{id}', [OrderController::class, 'adminShow']);
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus']);
    Route::post('/orders/{id}/fulfill', [OrderController::class, 'fulfill']);
    
    // Customers Management
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/{id}', [CustomerController::class, 'show']);
    Route::put('/customers/{id}', [CustomerController::class, 'adminUpdate']);
    Route::post('/customers/{id}/ban', [CustomerController::class, 'ban']);
    Route::post('/customers/{id}/unban', [CustomerController::class, 'unban']);
    
    // Reports
    Route::get('/reports/sales', [ProductController::class, 'salesReport']);
    Route::get('/reports/products', [ProductController::class, 'productsReport']);
    Route::get('/reports/customers', [CustomerController::class, 'customersReport']);
});

/*
|--------------------------------------------------------------------------
| Session Check Routes
|--------------------------------------------------------------------------
*/
Route::prefix('v1')->group(function () {
    // Check customer session
    Route::get('/account/check', [CustomerAuthController::class, 'check']);
    
    // Check admin session
    Route::get('/admin/check', [AdminAuthController::class, 'check']);
});
