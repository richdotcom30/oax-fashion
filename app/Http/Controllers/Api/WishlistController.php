<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Get user's wishlist
     */
    public function index(Request $request)
    {
        $customer = $request->user()->customer;
        
        $wishlist = $customer->wishlist()
            ->with(['product.images', 'product.category'])
            ->get()
            ->pluck('product');

        return response()->json($wishlist);
    }

    /**
     * Add product to wishlist
     */
    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $customer = $request->user()->customer;

        // Check if already in wishlist
        if ($customer->wishlist()->where('product_id', $productId)->exists()) {
            return response()->json(['message' => 'Product already in wishlist'], 400);
        }

        $customer->wishlist()->create([
            'product_id' => $productId
        ]);

        return response()->json(['message' => 'Added to wishlist'], 201);
    }

    /**
     * Remove product from wishlist
     */
    public function remove(Request $request, $productId)
    {
        $customer = $request->user()->customer;
        
        $customer->wishlist()->where('product_id', $productId)->delete();

        return response()->json(['message' => 'Removed from wishlist']);
    }

    /**
     * Move product from wishlist to cart
     */
    public function moveToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $customer = $request->user()->customer;

        // Add to cart
        $cart = $customer->user->cart ?? [];
        $cart[] = [
            'product_id' => $productId,
            'quantity' => 1,
            'price' => $product->price
        ];
        $customer->user->cart = $cart;
        $customer->user->save();

        // Remove from wishlist
        $customer->wishlist()->where('product_id', $productId)->delete();

        return response()->json(['message' => 'Moved to cart']);
    }
}
