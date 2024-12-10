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

        Addresses::create([
            'user_id' => $user->id,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'county' => $request->county,
            'country' => $request->country,
            'post_code' => $request->post_code,
            'type' => "shipping",
        ]);

        Addresses::create([
            'user_id' => $user->id,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'county' => $request->county,
            'country' => $request->country,
            'post_code' => $request->post_code,
            'type' => "billing",
        ]);



        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*',
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        $order = Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'order_status' => 'pending',
            'total_amount' => $total_amount,
            'payment_method' => 'card',
            'amount_paid' => $total_amount,
            'payment_date' => now(),
        ]);

        foreach ($basketItems as $order_item)
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $order_item->product_id,
                'quantity' => $order_item->quantity,

            ]);


        return redirect()->route('checkout.confirmation');
    }



    public function confirmation()
    {
        return view('checkout.confirmation');
    }



}