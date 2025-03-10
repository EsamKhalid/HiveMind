<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Users;
use App\Models\Order;
use App\Models\StockOrder;

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

      $stockOrders = StockOrder::select('id', 'product_id', 'stock_quantity', 'created_at')
         ->selectRaw('"stockOrder" AS type')
         ->where('created_at', '>=', now()->subDay())
         ->get();

      $notifications = $userCreated->concat($stockOrders)->concat($userOrders)->values()->sortByDesc('created_at');

      return view('admin.dashboard', [
         'notifications' => $notifications,
      ]);

      //return view('admin.dashboard');

   }

   public function notifs()
   {

      return view('admin.notifications');

   }
}
