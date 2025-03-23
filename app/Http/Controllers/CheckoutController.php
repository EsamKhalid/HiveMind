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
use App\Models\Guest;

class CheckoutController extends Controller
{

    public function view()
    {
        return view('checkout.checkout');
    }

    public function getBasket()
    {
        // Retrieve Basket

        // Check if user is logged in
        $user = Auth::user();

        // If the user is logged in, fetch user's basket from database.
        if ($user) {
            $basket = Basket::where('user_id', $user->id)->first();
        } else {
            // Fetch guest id from session
            $guestID = session()->get('guest_id');

            // If guest id not found, create new guest and store id in session
            if (!$guestID) {
                $guest = Guest::create();
                $guestID = $guest->id;
                session()->put('guest_id', $guestID);
            }

            // Fetch or create basket for guest
            $basket = Basket::firstOrCreate(['guest_id' => $guestID]);
        }

        return $basket;
    }

    public function getAddress()
    {

        $user = Auth::user();

        if ($user) {
            $address = Addresses::where('user_id', $user->id)->first();
        } else {
            $guestID = session()->get('guest_id');
            $address = Addresses::where('guest_id', $guestID)->first();
        }

        return $address;
    }

    public function storeAddress(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            'street_address' => 'required',
            'city' => 'required',
            'county' => 'required',
            'country' => 'required',
            'post_code' => 'required',
            'type' => 'required',
        ]);

        $address = $this->getAddress();

        if ($address == null) {
            if ($user) {
                Addresses::create([
                    'user_id' => $user->id,
                    'guest_id' => null,
                    'street_address' => $request->street_address,
                    'city' => $request->city,
                    'county' => $request->county,
                    'country' => $request->country,
                    'post_code' => $request->post_code,
                    'type' => "shipping",
                ]);
            } else {
                $guestID = session()->get('guest_id');

                Addresses::create([
                    'user_id' => null,
                    'guest_id' => $guestID,
                    'street_address' => $request->street_address,
                    'city' => $request->city,
                    'county' => $request->county,
                    'country' => $request->country,
                    'post_code' => $request->post_code,
                    'type' => "shipping",
                ]);
            }
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


        return view('checkout.checkoutBilling');
    }

   public function storeGuest(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email_address' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:12|regex:/^\+?[0-9]{10,12}$/',
        ]);

        $existingGuest = Guest::where('email_address', $request->input('email_address'))->first();

        if ($existingGuest) {
            $guest = $existingGuest;
        } else {
            $guestID = session()->get('guest_id');
            $guest = Guest::where('id', $guestID)->first();

            $guest->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email_address' => $request->input('email_address'),
                'phone_number' => $request->input('phone_number'),
            ]);
        }

        session()->put('guest_id', $guest->id);

        return redirect()->route('checkout.view');

    }

    public function checkout()
    {
        $user = Auth::user();
        $basket = $this->getBasket();
        $total_amount = 0;

        $address = $this->getAddress();

        $basketItems = BasketItems::where('basket_id', $basket->id)
            ->join('products', 'basket_items.product_id', '=', 'products.id')
            ->select(
                'basket_items.*',
                'products.product_name',
                'products.description',
                'products.price',
                'products.stock_level'
            )->get();

        if (!$user) {
            $guestID = session()->get('guest_id');
            $guest = Guest::where('id', $guestID)->first();

            if (($guest->first_name == null) || ($guest->last_name == null) || ($guest->email_address == null) || ($guest->phone_number == null)) {
                return redirect()->route('checkout.view')->withErrors(['msg' => ' PLEASE FILL IN DETAILS']);
            }
        }

        if ($address == null) {
            return redirect()->route('checkout.view')->withErrors(['msg' => ' PLEASE FILL IN ADDRESS']);
        }

        foreach ($basketItems as $order_item) {
            if ($order_item->stock_level < $order_item->quantity) {
                return redirect()->route('checkout.view')->withErrors(['msg' => ' PRODUCT OUT OF STOCK']);
            }
        }

        if ($user) {
            $order = Order::create([
                'user_id' => $user->id,
                'guest_id' => null,
                'order_date' => now(),
                'order_status' => 'pending',
                'total_amount' => $basket->total_amount,
                'payment_method' => 'card',
                'amount_paid' => $basket->total_amount,
                'payment_date' => now(),
                'confirmation_number' => mt_rand(100000, 999999),
            ]);

            foreach ($basketItems as $order_item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $order_item->product_id,
                    'quantity' => $order_item->quantity,
                ]);

                $product = Products::find($order_item->product_id);
                $product->stock_level = $product->stock_level - $order_item->quantity;
                $product->save();
            }

            $basket = Basket::where('user_id', $user->id)->first();
            BasketItems::where('basket_id', $basket->id)->delete();
            $basket->delete();

            return redirect()->route('checkout.confirmation', $order->confirmation_number);
        } else {
            $guestID = session()->get('guest_id');

            $order = Order::create([
                'user_id' => null,
                'guest_id' => $guestID,
                'order_date' => now(),
                'order_status' => 'pending',
                'total_amount' => $basket->total_amount,
                'payment_method' => 'card',
                'amount_paid' => $basket->total_amount,
                'payment_date' => now(),
                'confirmation_number' => mt_rand(100000, 999999),
            ]);

            foreach ($basketItems as $order_item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $order_item->product_id,
                    'quantity' => $order_item->quantity,
                ]);

                $product = Products::find($order_item->product_id);
                $product->stock_level = $product->stock_level - $order_item->quantity;
                $product->save();
            }

            $basket = Basket::where('guest_id', $guestID)->first();
            BasketItems::where('basket_id', $basket->id)->delete();
            $basket->delete();

            return redirect()->route('checkout.confirmation', $order->confirmation_number);
        }

        return redirect()->route('review.siteReview');
    }

    public function confirmation($confNum)
    {
        return view('checkout.confirmation', ['confirmation_number' => $confNum]);
    }

    public function storeBillingAddress() 
    {
        //return redirect()->route('checkout.checkout', $order->confirmation_number);
        return redirect()->route('checkout.checkout');
    }

    //public function billing()
    //{
    //    return view('checkout.billing');
    //}
}