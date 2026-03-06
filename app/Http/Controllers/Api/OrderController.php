<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * List customer orders
     */
    public function index(Request $request)
    {
        $orders = Order::where('customer_id', Auth::id())
            ->with('items')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($orders);
    }

    /**
     * Get single order
     */
    public function show($id)
    {
        $order = Order::where('id', $id)
            ->where('customer_id', Auth::id())
            ->with(['items', 'payments'])
            ->firstOrFail();

        return response()->json($order);
    }

    /**
     * Cancel order
     */
    public function cancel(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->where('customer_id', Auth::id())
            ->firstOrFail();

        if (!in_array($order->status, ['pending', 'processing'])) {
            return response()->json(['error' => 'Order cannot be cancelled'], 400);
        }

        $order->update(['status' => 'cancelled']);

        return response()->json(['message' => 'Order cancelled successfully']);
    }

    /**
     * Admin: List all orders
     */
    public function adminIndex(Request $request)
    {
        $query = Order::with(['customer', 'items']);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $query->where('order_number', 'like', '%' . $request->search . '%');
        }

        $perPage = $request->get('per_page', 20);
        $orders = $query->orderBy('created_at', 'desc')->paginate($perPage);

        return response()->json($orders);
    }

    /**
     * Admin: Update order status
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled,refunded'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $validated['status']]);

        if ($validated['status'] === 'shipped') {
            $order->update(['shipped_at' => now()]);
        } elseif ($validated['status'] === 'delivered') {
            $order->update(['delivered_at' => now()]);
        }

        return response()->json($order);
    }

    /**
     * Admin: Ship order
     */
    public function ship(Request $request, $id)
    {
        $validated = $request->validate([
            'tracking_number' => 'nullable|string'
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'shipped',
            'shipping_tracking_number' => $validated['tracking_number'] ?? null,
            'shipped_at' => now()
        ]);

        return response()->json($order);
    }

    /**
     * Admin: Dashboard analytics
     */
    public function dashboard(Request $request)
    {
        $period = $request->get('period', 30); // days

        // Revenue
        $revenue = Order::where('status', '!=', 'cancelled')
            ->where('created_at', '>=', now()->subDays($period))
            ->sum('total');

        // Orders count
        $ordersCount = Order::where('created_at', '>=', now()->subDays($period))
            ->count();

        // Average order value
        $avgOrderValue = $ordersCount > 0 ? $revenue / $ordersCount : 0;

        // Recent orders
        $recentOrders = Order::with('customer')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Top products
        $topProducts = \DB::table('order_items')
            ->select('product_name', \DB::raw('SUM(quantity) as total_sold'), \DB::raw('SUM(row_total) as total_revenue'))
            ->groupBy('product_name')
            ->orderBy('total_sold', 'desc')
            ->limit(5)
            ->get();

        return response()->json([
            'revenue' => $revenue,
            'orders_count' => $ordersCount,
            'avg_order_value' => $avgOrderValue,
            'recent_orders' => $recentOrders,
            'top_products' => $topProducts
        ]);
    }

    /**
     * Admin: Revenue analytics
     */
    public function revenue(Request $request)
    {
        $period = $request->get('period', 30); // days

        $revenueByDay = Order::where('status', '!=', 'cancelled')
            ->where('created_at', '>=', now()->subDays($period))
            ->select(\DB::raw('DATE(created_at) as date'), \DB::raw('SUM(total) as revenue'), \DB::raw('COUNT(*) as orders'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($revenueByDay);
    }
}
