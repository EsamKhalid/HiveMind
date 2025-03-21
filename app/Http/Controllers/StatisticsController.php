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
        $avgOrderValue = $revenue / count($orders);
        $avgOrderValue = number_format((float)$avgOrderValue, 2, '.', '');
        $noReturnedOrders = Order::where('order_status', "Return Approved")->count();
        
        $inventoryValue = 0;
        $inventoryItems = 0;

        $products = Products::all();
        foreach($products as $product){
            $inventoryValue = $inventoryValue + ($product->price * $product->stock_level);
            $inventoryItems = $inventoryItems += $product->stock_level;
        }
        
        $returnRate =  number_format((float)$noReturnedOrders / count($orders), 2, '.', '') * 10;

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

         if($noProdReviews > 0){
              $avgProductRating = $avgProductRating / $noProdReviews;
        }
        else{
            $avgProductRating = 0;
        }

       

        foreach($siteReviews as $review){
            $avgSiteRating = $avgSiteRating + $review->rating;
        }

        if($noSiteReviews > 0){
             $avgSiteRating = $avgSiteRating / $noSiteReviews;
        }
        else{
            $avgSiteRating = 0;
        }

        $orderItems = OrderItem::all();

        ($orderItems[0]->products->product_type);

        $categorySales = array("Beauty" => 0, "Health" => 0, "Haircare" => 0, "Skincare" => 0, "Merchandise" => 0);

        foreach($orderItems as $order){
            $categorySales[$order->products->product_type] += 1;
        }
        

        // $test = "var";

        // $arr = array("var" => 0, "var2" => 10);  

        // $arr[$test] += 2;

        // dd($arr["var"]);


        
    

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
