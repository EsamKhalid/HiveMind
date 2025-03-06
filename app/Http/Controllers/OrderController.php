<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\ReturnRequest;
use App\Models\ReturnItem;

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
    

    public function showReturnForm($id)
    {
        $order = Order::with('orderItems.products')->findOrFail($id);
        if ($order->order_status !== 'Delivered') {
            return redirect()->route('orders')->with('error', 'You can only return delivered orders.');
        }
        return view('orders.return', compact('order'));
    }


    public function returnRequest(Request $request, $id)
    {
        
        $order = Order::findOrFail($id);

        $request->merge([
            'items' => array_map('intval', $request->input('items', []))
        ]);
        
        $validated = $request->validate([
            'return_date' => 'required|date',
            'reason' => 'required|string|max:255',
            'comments' => 'nullable|string|max:500',
            'items' => 'required|array|min:1',
            'items.*' => 'exists:order_items,id',
        ]);

        $returnRequest = ReturnRequest::create([
            'order_id' => $order->id,
            'return_date' => $validated['return_date'],
            'reason' => $validated['reason'],
            'comments' => $validated['comments'] ?? '',
        ]);
 
        foreach ($validated['items'] as $itemId) {
            ReturnItem::create([
                'return_id' => $returnRequest->id,
                'order_item_id' => $itemId,
                'quantity' => 1, // Default to 1 if no quantity is provided
            ]);
        }
        
        $order->update(['order_status' => 'Return Requested']);

        return redirect()->route('orders')->with('success', 'Return request submitted successfully.');
    }


    public function cancelReturn($id)
    {
        $order = Order::findOrFail($id);
    
        if ($order->order_status === 'Return Requested') {
            ReturnRequest::where('order_id', $order->id)->delete();
            $order->update(['order_status' => 'Delivered']);
        }
    
        return redirect()->route('orders')->with('success', 'Return request cancelled successfully.');
    }


    public function cancelOrder($id) {
        $order = Order::findOrFail($id);
    
        if (in_array($order->order_status, ['pending', 'Processing', 'Shipped'])) {
            $order->delete();
            return redirect()->route('orders')->with('success', 'Order cancelled successfully.');
        }
    
        return redirect()->route('orders')->with('error', 'Cannot cancel order with current status.');
    }

    
} 