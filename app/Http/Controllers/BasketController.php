<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use App\Models\BasketItems;
use App\Models\Products;

use App\Models\Users;

class BasketController extends Controller
{
    //
    public function view()
    {
        //check if user is logged in
        $user = Auth::user();

        //if not logged in, redirect to login page
        if (!$user) {
            return redirect()->route('login');
        }

        //creates basket object from the database using the user id
        $basket = Basket::where('user_id', $user->id)->first();

        //if there is no basket, it creates it and adds to the database
        if (!$basket) {
            $basket = Basket::Create([
                'user_id' => $user->id,
                'total_amount' => 0
            ]);
        }



        //$basketItems = BasketItems::where('basket_id',$basket->id)->select('basket_items.*')->get();



        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*', // Select all basket item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        //$basketItem = $basketItems->where('product_id', 1)->first();

        $basket->update([
            'total_amount' => $this->basketTotal()
        ]);


        //echo $basketItem;


        //  $basketItems = BasketItems::where('basket_id', $basket->id)
        //     ->join('products','basket_items.product_id','=','products.id')
        //     ->select(
        //      'basket_items.*', //.* means it selects all basket item fields
        //      'products.product_name',
        //      'products.description',
        //      'products.price'
        //     )->get();

        return view('basket.basket', [
            'basketItems' => $basketItems,
            'basket' => $basket
        ]);
        //return view('basket.basket', ['basket' => $basket]);
        //return view('basket.basket');
    }



    public function increaseQuantity(Request $request){
        $user = Auth::user();

        $productId = $request->input('product_id');

        $basket = Basket::where('user_id', $user->id)->first();

        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*', // Select all basket item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        $basketItem = $basketItems->where('product_id', $productId)->first();

        $basketItem->quantity += 1;
        $basketItem->save();

    
        //redirect back to basket page
        return redirect()->route('basket.view');
    }

    public function decreaseQuantity(Request $request){
        $user = Auth::user();

        $productId = $request->input('product_id');

        $basket = Basket::where('user_id', $user->id)->first();

        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*', // Select all basket item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        $basketItem = $basketItems->where('product_id', $productId)->first();

         if($basketItem->quantity == 1){
            $basketItem->delete();
        }
        else{
            //reduce quant by 1
             $basketItem->quantity -= 1;
             $basketItem->save();
        }

    
        //redirect back to basket page
        return redirect()->route('basket.view');
    }




    public function updateQuantity(Request $request)
    {
        $user = Auth::user();

        $newQuantity = $request->input('quantity');
        $productId = $request->input('product_id');

        $basket = Basket::where('user_id', $user->id)->first();

        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*', // Select all basket item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        $basketItem = $basketItems->where('product_id', $productId)->first();

        if ($newQuantity == 0) {
            // Remove the item from the basket
            $basketItem->delete();
        } else {
            // Update the quantity
            $basketItem->quantity = $newQuantity;
            $basketItem->save();
        }




        echo $productId;

        $basket->update([
            'total_amount' => $this->basketTotal()
        ]);

        //return view('basket.basket', ['basketItems' => $basketItems]); 

        return redirect()->route('basket.view');

    }

    public function removeFromBasket(Request $request)
    {
        $user = Auth::user();

        $newQuantity = $request->input('quantity');
        $productId = $request->input('product_id');

        $basket = Basket::where('user_id', $user->id)->first();

        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*', // Select all basket item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        $basketItem = $basketItems->where('product_id', $productId)->first();



        //$basketItem->quantity = $request->input('quantity');
        //$basketItem->save();


        $basketItem->delete();

        $basket->update([
            'total_amount' => $this->basketTotal()
        ]);



        //return view('basket.basket', ['basketItems' => $basketItems]); 

        return redirect()->route('basket.view');
    }

    public function addToBasket(Request $request)
    {
        if (Auth::check()) {
        $user = Auth::user();
        $basket = Basket::where('user_id', $user->id)->first();
        $productId = $request->input('product_id');


        if (!$basket) {
            $basket = Basket::Create([
                'user_id' => $user->id,
                'total_amount' => 0
            ]);
        }

        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*', // Select all basket item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();


        $basketItem = $basketItems->where('product_id', $productId)->first();

        if (is_null($basketItem)) {
            BasketItems::Create([
                'basket_id' => $basket->id,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        } else {
            $basketItem->quantity = $basketItem->quantity + 1;
            $basketItem->save();
        }

        $basket->update([
            'total_amount' => $this->basketTotal()
        ]);

        //$totalPrice = 0;
//
        //foreach ($basketItems as $item) {
        //    $totalPrice += $item->price * $item->quantity;
        //}
//
        //$basket->update([
        //    'total_amount' => $totalPrice
        //]);


        // echo $request->input('product_id');


        return redirect()->route('basket.view');

    } else {
        return redirect()->route('login')->with('success', 'Signup successful!');
    }


    }

    public function basketTotal()
    {
        $user = Auth::user();
        $basket = Basket::where('user_id', $user->id)->first();

        $basketItem = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', "=", 'products.id')
            ->select(
                'basket_items.*',
                'products.price',
            )->get();

        $totalPrice = 0;

        foreach ($basketItem as $item) {
            $totalPrice += $item->price * $item->quantity;
        }


        return $totalPrice;



        

    }


    //public function clearBasket() {
//
    //    $user = Auth::user();
//
    //}

    //public function toCheckout()
    //{
    //    $redirect = Auth::user();
    //    return redirect()->route('checkout.view');
    //}



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
            'total_amount' => $basket->total_amount,
            'payment_method' => 'card',
            'amount_paid' => $basket->$total_amount,
            'payment_date' => now(),
        ]);

        foreach ($basketItems as $order_item)
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $order_item->product_id,
                'quantity' => $order_item->quantity,

            ]);

        $basket = Basket::where('user_id', $user->id)->first();

        BasketItems::where('basket_id', $basket->id)->delete();

        $basket->delete();


        return redirect()->route('checkout.confirmation');
    }


}
