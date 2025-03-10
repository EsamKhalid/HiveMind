<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Users;
use App\Models\Order;
use App\Models\StockOrder;
use App\Models\Products;

class AdminController extends Controller
{
   public function dashboard()
   {

      $userCreated = Users::select('id', 'first_name', 'last_name', 'created_at')
         ->selectRaw('"userCreated" AS type')
         ->where('created_at', '>=', now()->subDay())
         ->get();

      $userOrders = Order::select('id', 'total_amount', 'created_at')
         ->selectRaw('"userOrder" AS type')
         ->where('created_at', '>=', now()->subDay())
         ->get();

      $stockOrders = StockOrder::select('stock_orders.id', 'stock_orders.product_id', 'stock_orders.stock_quantity', 'stock_orders.created_at', 'products.product_name')
         ->selectRaw('"stockOrder" AS type')
         ->join('products', 'stock_orders.product_id', '=', 'products.id')
         ->where('stock_orders.created_at', '>=', now()->subDay())
         ->get();

      $noStock = Products::select('id', 'product_name', 'stock_level', 'created_at')
         ->selectRaw('"noStock" AS type')
         ->where('stock_level', '==', 0)
         ->get();

      $lowStock = Products::select('id', 'product_name', 'stock_level', 'created_at')
         ->selectRaw('"lowStock" AS type')
         ->where('stock_level', '>', 0)
         ->where('stock_level', '<', 20)
         ->get();

      $notifications = $userCreated->concat($stockOrders)->concat($userOrders)->values()->sortByDesc('created_at');
      $live_reports = $noStock->merge($lowStock)->sortByDesc('stock_level')->sortBy('stock_level');

      return view('admin.dashboard', [
         'notifications' => $notifications,
         'live_reports' => $live_reports,
      ]);

      //return view('admin.dashboard');

   }

   public function notifs()
   {

      return view('admin.notifications');

   }
}
