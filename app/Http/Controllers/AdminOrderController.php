<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ReturnRequest;

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

            return redirect()->route('admin.adminOrder')->with('success', "Status of Order #{$order->id} updated successfully.");
        }

        return redirect()->route('admin.adminOrder')->with('error', 'Invalid status update.');
    }

    public function returnRequest(Order $order)
    {
        $returnRequest = ReturnRequest::with('returnItems.orderItem.products')->where('order_id', $order->id)->first();

        if (!$returnRequest) {
            return redirect()->route('admin.adminOrder')->with('error', "No return request found for Order #{$order->id}.");
        }

        return view('admin.returnRequest', compact('order', 'returnRequest'));
    }

    public function approveReturn(Request $request, ReturnRequest $returnRequest)
    {
        if (!$returnRequest) {
            return redirect()->route('admin.adminOrder')->with('error', "Return request for Order #{$order->id} not found.");
        }

        $returnRequest->return_status = 'Approved';
        $returnRequest->save();

        $order = $returnRequest->order;
        $order->order_status = 'Return Approved';
        $order->save();

        return redirect()->route('admin.adminOrder', $order->id)->with('success', "Return request for Order #{$order->id} approved successfully.");
    }

    public function denyReturn(Request $request, ReturnRequest $returnRequest)
    {
        if (!$returnRequest) {
            return redirect()->route('admin.adminOrder')->with('error', "Return request for Order #{$order->id} not found.");
        }

        $returnRequest->return_status = 'Denied';
        $returnRequest->save();

        $order = $returnRequest->order;
        $order->order_status = 'Return Denied';
        $order->save();

        return redirect()->route('admin.adminOrder', $returnRequest->order_id)->with('success', "Return request for Order #{$order->id} denied successfully.");
    }

    public function processAllOrders()
    {
        $adminId = auth()->user()->id;
    
        $orders = Order::whereNotIn('order_status', ['Delivered', 'Return Requested', 'Return Approved', 'Return Denied'])
                    ->where('user_id', '!=', $adminId)
                    ->get();

        foreach ($orders as $order) {
            switch ($order->order_status) {
                case 'pending':
                    $order->order_status = 'Processing';
                    break;
                case 'Processing':
                    $order->order_status = 'Shipped';
                    break;
                case 'Shipped':
                    $order->order_status = 'Delivered';
                    break;
            }
            $order->save();
        }

        return redirect()->back()->with('success', 'All orders have been processed to the next stage.');
    }


}
