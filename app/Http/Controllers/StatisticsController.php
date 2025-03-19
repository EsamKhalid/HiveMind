<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Guest;
use App\Models\Order;

class StatisticsController extends Controller
{
    //
    public function view(){
        $registeredUsers = Users::count();
        $unregisteredUsers = Guest::count();
        $numberOfOrders = Order::count();
        $revenue = 0;
        $orders = Order::all();
        foreach($orders as $ord){
            $revenue = $revenue + $ord->total_amount;
        }
        return view('admin.statistics', compact('unregisteredUsers', 'registeredUsers', 'numberOfOrders', 'revenue'));
    }
}

// Total number of users
// Number of new users in the last month
// Active users vs. inactive users
// User growth rate
// Product Statistics

// Total number of products
// Number of products added in the last month
// Most popular products (based on sales or views)
// Products low in stock
// Sales Statistics

// Total sales revenue
// Sales revenue in the last month
// Number of orders
// Average order value
// Sales by product category
// Order Statistics

// Total number of orders
// Number of orders in the last month
// Order fulfillment rate
// Number of returned orders
// Inventory Statistics

// Total inventory value
// Number of items in stock
// Number of items out of stock
// Inventory turnover rate
// Customer Support Statistics

// Number of support tickets
// Average response time
// Number of resolved tickets
// Customer satisfaction rate
