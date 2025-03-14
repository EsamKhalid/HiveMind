<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use App\Models\BasketItems;
use App\Models\Products;

use App\Models\Users;
use App\Models\Guest;

use App\Models\Addresses;

class BasketController extends Controller
{
    //
    public function view()
    {

        $basket = $this->getBasket();

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

        $user = Auth::user();

        if ($user) {
            $address = Addresses::where('user_id', $user->id)->first();
        } else {
            $address = null;
        }

        return view('basket.basket', [
            'basketItems' => $basketItems,
            'basket' => $basket,
            'address' => $address
        ]);
        //return view('basket.basket', ['basket' => $basket]);
        //return view('basket.basket');
    }

    public function getBasket()
    {
        //Retrieve Basket

        //Check if user is logged in
        $user = Auth::user();

        //If the user is logged in, fetch users' basket from database.
        if ($user) {
            $basket = Basket::where('user_id', $user->id)->first();
        }

        //If user is not logged in, fetch guests' basket from database.
        else {
            //Fetch guest id from session
            $guestID = session()->get('guest_id');

            //If guest id not found, create new guest and store id in session
            if (!$guestID) {
                $guest = Guest::create();
                $guestID = $guest->id;
                session()->put('guest_id', $guestID);
            }

            $basket = Basket::where('guest_id', $guestID)->first();
        }


        //Create Basket

        //if there is no basket, create basket for respective user
        if (!$basket) {

            if ($user) {
                $basket = Basket::Create([
                    'user_id' => $user->id,
                    'guest_id' => null,
                    'total_amount' => 0
                ]);
            } else {
                $basket = Basket::Create([
                    'user_id' => null,
                    'guest_id' => $guestID,
                    'total_amount' => 0
                ]);
            }

        }

        return $basket;
    }


    public function increaseQuantity(Request $request)
    {

        $productId = $request->input('product_id');
        $basket = $this->getBasket();

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

    public function decreaseQuantity(Request $request)
    {

        $productId = $request->input('product_id');
        $basket = $this->getBasket();

        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*', // Select all basket item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        $basketItem = $basketItems->where('product_id', $productId)->first();

        if ($basketItem->quantity == 1) {
            $basketItem->delete();
        } else {
            //reduce quant by 1
            $basketItem->quantity -= 1;
            $basketItem->save();
        }

        //redirect back to basket page
        return redirect()->route('basket.view');
    }


    public function updateQuantity(Request $request)
    {

        $newQuantity = $request->input('quantity');
        $productId = $request->input('product_id');
        $basket = $this->getBasket();

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

        $newQuantity = $request->input('quantity');
        $productId = $request->input('product_id');
        $basket = $this->getBasket();

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

        $basket = $this->getBasket();
        $productId = $request->input('product_id');

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

        //} else {
        //    return redirect()->route('login')->with('success', 'Signup successful!');
        //}

    }

    public function basketTotal()
    {

        $basket = $this->getBasket();

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

    public function transferBasket()
    {
        $user = Auth::user();
        $guestID = session()->get('guest_id');

        if ($guestID) {
            $guestBasket = Basket::where('guest_id', $guestID)->first();
            $userBasket = Basket::where('user_id', $user->id)->first();

            if ($guestBasket && $userBasket) {
                return redirect()->route('basket.view');

            } elseif ($guestBasket) {
                $guestBasket->update([
                    'user_id' => $user->id,
                    'guest_id' => null,
                ]);
            session()->forget('guest_id');
            return redirect()->route('basket.view');
            
        } else
            return redirect()->route('basket.view');
        }
    }

}