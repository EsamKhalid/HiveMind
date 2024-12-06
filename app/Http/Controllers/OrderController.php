<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // need to create Order and Product Models for this to work - I did this
    // I was using dummy orders data for frontend testing, now trying to use actual data
    public function index()
    {

    $orders = collect([
        (object)[
            'id' => 1,
            'order_date' => '2024-12-04',
            'order_status' => 'Delivered',
            'total_amount' => 99.99,
            'orderItems' => collect([
                (object)[
                    'product' => (object)[
                        'product_name' => 'Wireless Headphones',
                        'description' => 'Bluetooth-enabled over-ear headphones with noise cancellation.',
                        'price' => 79.99,
                    ],
                    'quantity' => 1
                ],
                (object)[
                    'product' => (object)[
                        'product_name' => 'Smartphone Case',
                        'description' => 'Durable and lightweight case for all smartphones.',
                        'price' => 19.99,
                    ],
                    'quantity' => 1
                ]
            ])
        ],
        (object)[
            'id' => 2,
            'order_date' => '2024-12-01',
            'order_status' => 'Shipped',
            'total_amount' => 39.99,
            'orderItems' => collect([
                (object)[
                    'product' => (object)[
                        'product_name' => 'Laptop Stand',
                        'description' => 'Ergonomic adjustable laptop stand.',
                        'price' => 39.99,
                    ],
                    'quantity' => 1
                ]
            ])
        ]
    ]);
    
    // Fetch authenticated user's orders with related items and products
    /* $orders = Order::with(['orderItems.product'])
        ->where('user_id', auth()->id()) 
        ->get(); */

    return view('orders.orders', ['orders' => $orders]);
    }
} 
