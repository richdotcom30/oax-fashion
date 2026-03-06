<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Process checkout
     */
    public function process(Request $request)
    {
        $validated = $request->validate([
            'shipping_address' => 'required|array',
            'shipping_address.first_name' => 'required|string',
            'shipping_address.last_name' => 'required|string',
            'shipping_address.address_line_1' => 'required|string',
            'shipping_address.city' => 'required|string',
            'shipping_address.postal_code' => 'required|string',
            'shipping_address.country' => 'required|string|size:2',
            'shipping_address.phone' => 'nullable|string',
            'billing_address' => 'nullable|array',
            'shipping_method' => 'nullable|string',
            'payment_method' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $user = $request->user();
        
        // Get cart
        $cart = $user->cart ?? session()->get('cart', []);
        
        if (empty($cart)) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }

        // Calculate totals
        $subtotal = 0;
        $items = [];
        
        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $itemTotal = $product->price * $item['quantity'];
                $subtotal += $itemTotal;
                $items[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'size' => $item['size'] ?? null,
                    'color' => $item['color'] ?? null,
                    'price' => $product->price,
                    'total' => $itemTotal
                ];
            }
        }

        // Calculate shipping (free over $500)
        $shippingCost = $subtotal >= 500 ? 0 : 25;
        
        // Calculate tax (8%)
        $taxAmount = $subtotal * 0.08;
        
        // Total
        $total = $subtotal + $shippingCost + $taxAmount;

        // Generate order number
        $orderNumber = 'OX-' . strtoupper(Str::random(8));

        // Create order
        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_id' => $user->id,
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'tax_amount' => $taxAmount,
            'total' => $total,
            'status' => 'pending',
            'shipping_method' => $validated['shipping_method'] ?? 'standard',
            'notes' => $validated['notes'] ?? null,
        ]);

        // Create order items
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'product_name' => $item['product']->name,
                'variant_name' => $item['size'] ? ($item['color'] ? $item['size'] . ' / ' . $item['color'] : $item['size']) : null,
                'sku' => $item['product']->sku,
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'row_total' => $item['total']
            ]);
        }

        // Create payment record
        Payment::create([
            'order_id' => $order->id,
            'payment_method' => $validated['payment_method'],
            'transaction_id' => 'TXN-' . strtoupper(Str::random(16)),
            'amount' => $total,
            'status' => 'pending'
        ]);

        // Clear cart
        $user->cart = [];
        $user->save();

        // Add loyalty points (1 point per $1 spent)
        if ($user->customer) {
            $user->customer->loyalty_points += (int)$total;
            $user->customer->total_orders += 1;
            $user->customer->total_spent += $total;
            
            // Update tier based on total spent
            if ($user->customer->total_spent >= 10000) {
                $user->customer->tier = 'platinum';
            } elseif ($user->customer->total_spent >= 5000) {
                $user->customer->tier = 'gold';
            }
            $user->customer->save();
        }

        return response()->json([
            'order' => $order->load('items'),
            'message' => 'Order placed successfully'
        ], 201);
    }

    /**
     * Get available shipping methods
     */
    public function shippingMethods()
    {
        return response()->json([
            'methods' => [
                [
                    'id' => 'standard',
                    'name' => 'Standard Shipping',
                    'description' => '5-7 business days',
                    'price' => 25,
                    'free_over' => 500
                ],
                [
                    'id' => 'express',
                    'name' => 'Express Shipping',
                    'description' => '2-3 business days',
                    'price' => 45,
                    'free_over' => null
                ],
                [
                    'id' => 'overnight',
                    'name' => 'Overnight Shipping',
                    'description' => 'Next business day',
                    'price' => 75,
                    'free_over' => null
                ]
            ]
        ]);
    }
}
