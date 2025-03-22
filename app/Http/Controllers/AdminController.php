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

      $notifications = $this->notifs();
      $live_reports = $this->livereports();
      $statistics = $this->statistics();

      return view('admin.dashboard', [
         'notifications' => $notifications,
         'live_reports' => $live_reports,
         'statistics' => $statistics,
      ]);
   }

   public function notifications()
   {

      $notifications = $this->notifs();
      $live_reports = $this->livereports();
      $statistics = $this->statistics();

      return view('admin.notifications', [
         'notifications' => $notifications,
         'live_reports' => $live_reports,
         'statistics' => $statistics,
      ]);
   }

   public function livereports()
   {

      $noStock = Products::select('id', 'product_name', 'stock_level', 'created_at')
         ->selectRaw('"noStock" AS type')
         ->where('stock_level', '==', 0)
         ->get();

      $lowStock = Products::select('id', 'product_name', 'stock_level', 'created_at')
         ->selectRaw('"lowStock" AS type')
         ->where('stock_level', '>', 0)
         ->where('stock_level', '<', 20)
         ->get();

      $live_reports = $noStock->merge($lowStock)->sortBy('stock_level');

      return $live_reports;
   }

   public function statistics()
   {
      $ordersToday = Order::
         //select('id', 'created_at')
         selectRaw('COUNT(*) as count, "ordersToday" AS type')
         ->where('created_at', '>=', now()->subDay())
         //->count();
         ->first();

      $usersToday = Users::
         //select('id', 'created_at')
         selectRaw('COUNT(*) as count, "usersToday" AS type')
         ->where('created_at', '>=', now()->subDay())
         //->count();
         ->first();

      $statistics = [
         'ordersToday' => $ordersToday->count(),
         'usersToday' => $usersToday->count(),
      ];

      return $statistics;

   }

   public function notifs()
   {

      $userCreated = Users::select('id', 'first_name', 'last_name', 'created_at AS time')
         ->selectRaw('"userCreated" AS type')
         ->where('created_at', '>=', now()->subDay())
         ->get();

      //$userOrders = Order::select('orders.id', 'orders.total_amount', 'orders.created_at AS time', 'users.id', 'users.first_name', 'users.last_name', 'products.product_name', 'order_items.id', 'order_items.quantity')
      $userOrders = Order::select('orders.id', 'orders.total_amount', 'orders.created_at AS time', 'users.id', 'users.first_name', 'users.last_name')
         ->selectRaw('"userOrder" AS type')
         ->join('users', 'orders.user_id', '=', 'users.id')
         //->join('order_items', 'orders.id', '=', 'order_items.order_id')
         //->join('products', 'order_items.product_id', '=', 'products.id')
         ->where('orders.created_at', '>=', now()->subDay())
         ->get();

      $guestOrders = Order::select('orders.id', 'orders.total_amount', 'orders.created_at AS time', 'guests.id', 'guests.first_name', 'guests.last_name')
         ->selectRaw('"guestOrder" AS type')
         ->join('guests', 'orders.guest_id', '=', 'guests.id')
         //->join('order_items', 'orders.id', '=', 'order_items.order_id')
         //->join('products', 'order_items.product_id', '=', 'products.id')
         ->where('orders.created_at', '>=', now()->subDay())
         ->get();

      $userOrderUpdates = Order::select('orders.id', 'orders.order_status', 'orders.updated_at AS time', 'users.id', 'users.first_name', 'users.last_name', 'products.product_name', 'order_items.id', 'order_items.quantity')
         ->selectRaw('"orderUpdate" AS type')
         ->join('users', 'orders.user_id', '=', 'users.id')
         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
         ->join('products', 'order_items.product_id', '=', 'products.id')
         ->where('orders.updated_at', '>=', now()->subDay())
         ->whereColumn('orders.updated_at', '!=', 'orders.created_at')
         ->get();

      $guestOrderUpdates = Order::select('orders.id', 'orders.order_status', 'orders.updated_at AS time', 'guests.id', 'guests.first_name', 'guests.last_name', 'products.product_name', 'order_items.id', 'order_items.quantity')
         ->selectRaw('"orderUpdate" AS type')
         ->join('guests', 'orders.guest_id', '=', 'guests.id')
         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
         ->join('products', 'order_items.product_id', '=', 'products.id')
         ->where('orders.updated_at', '>=', now()->subDay())
         ->whereColumn('orders.updated_at', '!=', 'orders.created_at')
         ->get();

      $stockOrders = StockOrder::select('stock_orders.id', 'stock_orders.product_id', 'stock_orders.stock_quantity', 'stock_orders.created_at AS time', 'products.product_name')
         ->selectRaw('"stockOrder" AS type')
         ->join('products', 'stock_orders.product_id', '=', 'products.id')
         ->where('stock_orders.created_at', '>=', now()->subDay())
         ->get();

      $notifications = $userCreated->concat($stockOrders)->concat($userOrders)->concat($guestOrders)->concat($userOrderUpdates)->concat($guestOrderUpdates)->sortByDesc('time');

      return $notifications;

   }
}
