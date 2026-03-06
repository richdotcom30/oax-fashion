<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Get cart contents
     */
    public function index(Request $request)
    {
        // Get cart from session or database
        $cart = $request->user() ? $request->user()->cart : session()->get('cart', []);
        
        $items = [];
        $subtotal = 0;

        foreach ($cart as $item) {
            $product = Product::with('images')->find($item['product_id']);
            if ($product) {
                $itemTotal = $product->price * $item['quantity'];
                $items[] = [
                    'id' => $item['product_id'],
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'size' => $item['size'] ?? null,
                    'color' => $item['color'] ?? null,
                    'total' => $itemTotal
                ];
                $subtotal += $itemTotal;
            }
        }

        return response()->json([
            'items' => $items,
            'subtotal' => $subtotal,
            'shipping' => $subtotal >= 500 ? 0 : 25,
            'tax' => $subtotal * 0.08, // 8% tax
            'total' => $subtotal + ($subtotal >= 500 ? 0 : 25) + ($subtotal * 0.08)
        ]);
    }

    /**
     * Add item to cart
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        
        $cartItem = [
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'size' => $validated['size'] ?? null,
            'color' => $validated['color'] ?? null,
            'price' => $product->price
        ];

        if (Auth::check()) {
            // Save to user cart in database
            $user = $request->user();
            $existingCart = $user->cart ?? [];
            
            // Check if item already exists
            $found = false;
            foreach ($existingCart as &$item) {
                if ($item['product_id'] == $validated['product_id'] && 
                    $item['size'] == ($validated['size'] ?? null) && 
                    $item['color'] == ($validated['color'] ?? null)) {
                    $item['quantity'] += $validated['quantity'];
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                $existingCart[] = $cartItem;
            }
            
            $user->cart = $existingCart;
            $user->save();
        } else {
            // Save to session
            $cart = session()->get('cart', []);
            
            $found = false;
            foreach ($cart as &$item) {
                if ($item['product_id'] == $validated['product_id'] && 
                    $item['size'] == ($validated['size'] ?? null) && 
                    $item['color'] == ($validated['color'] ?? null)) {
                    $item['quantity'] += $validated['quantity'];
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                $cart[] = $cartItem;
            }
            
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Item added to cart', 'cart_count' => array_sum(array_column($cart ?? [], 'quantity'))]);
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, $itemId)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);

        if (Auth::check()) {
            $user = $request->user();
            $cart = $user->cart ?? [];
            
            foreach ($cart as &$item) {
                if ($item['product_id'] == $itemId) {
                    if ($validated['quantity'] > 0) {
                        $item['quantity'] = $validated['quantity'];
                    } else {
                        $cart = array_filter($cart, fn($i) => $i['product_id'] != $itemId);
                    }
                    break;
                }
            }
            
            $user->cart = array_values($cart);
            $user->save();
        } else {
            $cart = session()->get('cart', []);
            
            foreach ($cart as &$item) {
                if ($item['product_id'] == $itemId) {
                    if ($validated['quantity'] > 0) {
                        $item['quantity'] = $validated['quantity'];
                    } else {
                        $cart = array_filter($cart, fn($i) => $i['product_id'] != $itemId);
                    }
                    break;
                }
            }
            
            session()->put('cart', array_values($cart));
        }

        return response()->json(['message' => 'Cart updated']);
    }

    /**
     * Remove item from cart
     */
    public function remove(Request $request, $itemId)
    {
        if (Auth::check()) {
            $user = $request->user();
            $cart = $user->cart ?? [];
            $cart = array_filter($cart, fn($item) => $item['product_id'] != $itemId);
            $user->cart = array_values($cart);
            $user->save();
        } else {
            $cart = session()->get('cart', []);
            $cart = array_filter($cart, fn($item) => $item['product_id'] != $itemId);
            session()->put('cart', array_values($cart));
        }

        return response()->json(['message' => 'Item removed from cart']);
    }

    /**
     * Clear entire cart
     */
    public function clear(Request $request)
    {
        if (Auth::check()) {
            $request->user()->cart = [];
            $request->user()->save();
        } else {
            session()->forget('cart');
        }

        return response()->json(['message' => 'Cart cleared']);
    }
}
