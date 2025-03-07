<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Basket;
use App\Models\BasketItems;
use App\Models\Addresses;
use App\Models\Products;

class CheckoutController extends Controller
{

    public function view()
    {
        return view('checkout.checkout');
    }

    public function storeAddress(Request $request)
    {

        $user = Auth::user();
        $basket = Basket::where('user_id', $user->id)->first();
        $total_amount = 0;

        $request->validate([
            'street_address' => 'required',
            'city' => 'required',
            'county' => 'required',
            'country' => 'required',
            'post_code' => 'required',
            'type' => 'required',
        ]);


        //get the address of the user, returns null if they dont have an address
        $address = Addresses::where('user_id', $user->id)->first();


        if ($address == null) {
            Addresses::create([
                'user_id' => $user->id,
                'street_address' => $request->street_address,
                'city' => $request->city,
                'county' => $request->county,
                'country' => $request->country,
                'post_code' => $request->post_code,
                'type' => "shipping",
            ]);

            // Addresses::create([
            //     'user_id' => $user->id,
            //     'street_address' => $request->street_address,
            //     'city' => $request->city,
            //     'county' => $request->county,
            //     'country' => $request->country,
            //     'post_code' => $request->post_code,
            //     'type' => "billing",
            // ]);
        } else {
            $address->street_address = $request->street_address;
            $address->city = $request->city;
            $address->county = $request->county;
            $address->country = $request->country;
            $address->post_code = $request->post_code;
            $address->save();
        }


        // $basketItems = BasketItems::where('basket_id', $basket->id)
        //     ->join('products', 'basket_items.product_id', '=', 'products.id')
        //     ->select(
        //         'basket_items.*',
        //         'products.product_name',
        //         'products.description',
        //         'products.price'
        //     )->get();

        // $order = Order::create([
        //     'user_id' => $user->id,
        //     'order_date' => now(),
        //     'order_status' => 'pending',
        //     'total_amount' => $basket->total_amount,
        //     'payment_method' => 'card',
        //     'amount_paid' => $basket->$total_amount,
        //     'payment_date' => now(),
        // ]);

        // foreach ($basketItems as $order_item)
        //     OrderItem::create([
        //         'order_id' => $order->id,
        //         'product_id' => $order_item->product_id,
        //         'quantity' => $order_item->quantity,

        //     ]);

        // $basket = Basket::where('user_id', $user->id)->first();

        // BasketItems::where('basket_id', $basket->id)->delete();

        // $basket->delete();


        return redirect()->route('basket.view');
    }


    public function checkout()
    {
        $user = Auth::user();
        $basket = Basket::where('user_id', $user->id)->first();
        $total_amount = 0;

        $address = Addresses::where('user_id', $user->id)->first();

        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*',
                'products.product_name',
                'products.description',
                'products.price',
                'products.stock_level'
            )->get();


        if ($address == null) {
            return redirect()->route('basket.view')->withErrors(['msg' => ' PLEASE FILL IN ADDRESS']);
        }

        foreach ($basketItems as $order_item) { 

            if ($order_item->stock_level < $order_item->quantity) { //Checks if the selected product in basket is higher than the available product stock level.
                return redirect()->route('basket.view')->withErrors(['msg' => ' PROUCT OUT OF STOCK']); //Returns error, does not place order.
            }

        }

        $order = Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'order_status' => 'pending',
            'total_amount' => $basket->total_amount,
            'payment_method' => 'card',
            'amount_paid' => $basket->$total_amount,
            'payment_date' => now(),
        ]);

        foreach ($basketItems as $order_item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $order_item->product_id,
                'quantity' => $order_item->quantity,

            ]);

            $product = Products::find($order_item->product_id); //Retrieves the product id of the basket item.
            $product->stock_level = $product->stock_level - $order_item->quantity; //Reduces the stock level of the product by the quantity of item in basket.
            $product->save();
        }

        $basket = Basket::where('user_id', $user->id)->first();

        BasketItems::where('basket_id', $basket->id)->delete();
        $basket->delete();

        return redirect()->route('orders');
        
    }

    public function confirmation()
    {
        return view('checkout.confirmation');
    }

}