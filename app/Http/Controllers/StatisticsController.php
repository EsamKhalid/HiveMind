<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Guest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\Enquiries;
use App\Models\ProductReviews;
use App\Models\SiteReviews;

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
        $avgOrderValue = count($orders) > 0 ? $revenue / count($orders) : 0;
        $avgOrderValue = number_format((float)$avgOrderValue, 2, '.', '');
        $noReturnedOrders = Order::where('order_status', "Return Approved")->count();
        
        $inventoryValue = 0;
        $inventoryItems = 0;

        $products = Products::all();
        foreach($products as $product){
            $inventoryValue = $inventoryValue + ($product->price * $product->stock_level);
            $inventoryItems = $inventoryItems += $product->stock_level;
        }
        
        $returnRate = count($orders) > 0 ? number_format((float)$noReturnedOrders / count($orders), 2, '.', '') * 10 : 0;

        $noEnquiries = Enquiries::count();

        $noProdReviews = ProductReviews::count();
        $noSiteReviews = SiteReviews::count();

        $productReviews = ProductReviews::all();
        $siteReviews = SiteReviews::all();

        $avgSiteRating = 0;
        $avgProductRating = 0;
        
        foreach($productReviews as $review){
            $avgProductRating = $avgProductRating + $review->rating;
        }        

        $avgProductRating = $noProdReviews > 0 ? $avgProductRating / $noProdReviews : 0;

        foreach($siteReviews as $review){
            $avgSiteRating = $avgSiteRating + $review->rating;
        }

        $avgSiteRating = $noSiteReviews > 0 ? $avgSiteRating / $noSiteReviews : 0;

        $orderItems = OrderItem::all();

        if (count($orderItems) > 0 && isset($orderItems[0]->products->product_type)) {
            ($orderItems[0]->products->product_type);
        }

        $categorySales = array("beauty" => 0, "health" => 0, "haircare" => 0, "skincare" => 0, "merchandise" => 0);

        foreach($orderItems as $order){
            if (isset($order->products->product_type)) {
                $categorySales[strtolower($order->products->product_type)] += 1;
            }
        }

        $data = compact(
            'unregisteredUsers',
            'registeredUsers',
            'numberOfOrders',
            'revenue',
            'avgOrderValue',
            'noReturnedOrders',
            'inventoryValue',
            'returnRate',
            'noEnquiries',
            'noProdReviews',
            'noSiteReviews',
            'avgProductRating',
            'avgSiteRating',
            'categorySales',
            'inventoryItems',
        );

        return view('admin.statistics', ['data' => $data]);    
    }
}

