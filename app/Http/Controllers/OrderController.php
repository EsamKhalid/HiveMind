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

    public function submitReturnRequest(Request $request, $id) {
        $order = Order::findOrFail($id);
    
        $order->order_status = 'Return Requested';
        $order->save();
    
        return redirect()->route('orders')->with('success', 'Return request submitted successfully.');
    }
    
    
} 