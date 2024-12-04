<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // need to create Order and Product Models for this to work - backend team must do this
    // For the time being, I am using dummy orders data for frontend testing
    public function index()
    {
    
    $orders = [
        [
            'order_id' => 101,
            'product_name' => 'Wireless Headphones',
            'description' => 'Bluetooth-enabled over-ear headphones with noise cancellation.',
            'price' => 79.99,
            'order_date' => '2024-11-28',
            'order_status' => 'Delivered',
            'total_amount' => 79.99,
        ],
        [
            'order_id' => 102,
            'product_name' => 'Smartphone Case',
            'description' => 'Durable and lightweight case for all smartphones.',
            'price' => 19.99,
            'order_date' => '2024-11-25',
            'order_status' => 'Shipped',
            'total_amount' => 19.99,
        ],
    ];

    return view('orders.orders', ['orders' => $orders]);
    }
} 
