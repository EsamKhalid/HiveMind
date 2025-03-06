<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.products', 'user')->orderBy('created_at', 'desc')->get();
        return view('admin.adminOrder', compact('orders'));
    }

    public function processOrder(Request $request, Order $order)
    {
        $nextStatus = [
            'pending' => 'Processing',
            'Processing' => 'Shipped',
            'Shipped' => 'Delivered'
        ];

        if (isset($nextStatus[$order->order_status])) {
            $order->order_status = $nextStatus[$order->order_status];
            $order->save();

            return redirect()->route('admin.adminOrder')->with('success', 'Order status updated successfully.');
        }

        return redirect()->route('admin.adminOrder')->with('error', 'Invalid status update.');
    }

    public function returnRequest(Order $order)
    {
    return view('admin.returnRequest', compact('order'));
    }

}
