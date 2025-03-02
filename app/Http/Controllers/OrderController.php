<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;

class OrderController extends Controller
{

    public function index()
    {
        if(Auth::check()) {
           $orders = Order::with(['orderItems.products'])
           ->where('user_id', auth()->id()) 
           ->get(); 

           return view('orders.orders', ['orders' => $orders]);
        }
        else {
            return redirect()->route('login');
        }
    }

    public function showReturnForm($id) {
        $order = Order::with('orderItems.products')->findOrFail($id);
        return view('orders.return', compact('order'));
    }
    
    // Need table first, not yet connected to the return table
    public function returnRequest(Request $request, $id)
    {  
        /*
        $validated = $request->validate([
          'items' => 'required|array',
          'reason' => 'required|string',
          'comments' => 'nullable|string|max:500',
        ]); */

        $order = Order::findOrFail($id);
        $order->order_status = 'Return Requested';
        /*$order->return_reason = $validated['reason'];
        $order->return_comments = $validated['comments'] ?? null;*/
        $order->save();

        return redirect()->route('orders')->with('success', 'Return request submitted successfully.');
    }

    // not yet connected to backend table
    public function cancelReturn($id) {
        $order = Order::findOrFail($id);
        
        if ($order->order_status === 'Return Requested') {
            $order->order_status = 'Delivered';
            $order->save();
        }
    
        return redirect()->route('orders')->with('success', 'Return request cancelled successfully.');
    }

    public function cancelOrder($id) {
        $order = Order::findOrFail($id);
    
        if (in_array($order->order_status, ['Pending', 'Processing'])) {
            $order->delete();
            return redirect()->route('orders')->with('success', 'Order cancelled successfully.');
        }
    
        return redirect()->route('orders')->with('error', 'Cannot cancel order with current status.');
    }

    
} 