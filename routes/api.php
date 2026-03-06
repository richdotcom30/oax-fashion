<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\WishlistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group.
|
*/

// Public Routes
Route::prefix('v1')->group(function () {
    // Products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{slug}', [ProductController::class, 'show']);
    Route::get('/products/featured', [ProductController::class, 'featured']);
    
    // Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{slug}', [CategoryController::class, 'show']);
    
    // Customer Registration/Login (public)
    Route::post('/auth/register', [CustomerController::class, 'register']);
    Route::post('/auth/login', [CustomerController::class, 'login']);
});

// Protected Routes (require authentication)
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // User
    Route::get('/user', [CustomerController::class, 'user']);
    Route::post('/auth/logout', [CustomerController::class, 'logout']);
    Route::put('/user/profile', [CustomerController::class, 'updateProfile']);
    
    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::put('/cart/update/{itemId}', [CartController::class, 'update']);
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove']);
    Route::delete('/cart/clear', [CartController::class, 'clear']);
    
    // Checkout
    Route::post('/checkout', [CheckoutController::class, 'process']);
    Route::get('/checkout/shipping-methods', [CheckoutController::class, 'shippingMethods']);
    
    // Orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel']);
    
    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'add']);
    Route::delete('/wishlist/remove/{productId}', [WishlistController::class, 'remove']);
    Route::post('/wishlist/move-to-cart/{productId}', [WishlistController::class, 'moveToCart']);
});

// Admin Routes (require admin role)
Route::prefix('v1/admin')->middleware(['auth:sanctum', 'admin'])->group(function () {
    // Products Management
    Route::get('/products', [ProductController::class, 'adminIndex']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    
    // Categories Management
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
    
    // Orders Management
    Route::get('/orders', [OrderController::class, 'adminIndex']);
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus']);
    Route::post('/orders/{id}/ship', [OrderController::class, 'ship']);
    
    // Customers Management
    Route::get('/customers', [CustomerController::class, 'adminIndex']);
    Route::get('/customers/{id}', [CustomerController::class, 'adminShow']);
    Route::put('/customers/{id}', [CustomerController::class, 'adminUpdate']);
    
    // Analytics
    Route::get('/analytics/dashboard', [OrderController::class, 'dashboard']);
    Route::get('/analytics/revenue', [OrderController::class, 'revenue']);
    Route::get('/analytics/products', [ProductController::class, 'analytics']);
});
