<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\WishlistItems;

class WishlistController extends Controller
{
    //

    public function view() {

        $wishlist = $this->getWishlist();

        $wishlsitItems = WishlistItems::where('wishlist_id', $wishlist->id)
            ->join('products', 'wishlist_items.product_id', '=', 'products.id')
            ->select(
                'wishlist_items.*', // Select all wishlist item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        return view('wishlist', [
            'wishlist' => $wishlist,
        ]);
    }

    public function getWishlist()
    {
        //Retrieve Wishlist

        //Check if user is logged in
        $user = Auth::user();

        //If the user is logged in, fetch users' wishlist from database.
        if ($user) {
            $wishlist = Wishlist::where('user_id', $user->id)->first();
        }

        else {
            return redirect()->route('login');
        }

        if (!$wishlist) {
            $wishlist = Wishlist::Create([
                'user_id' => $user->id,
            ]);
        }

        return $wishlist;
    }

    public function addToWishlist(Request $request)
    {

        $wishlist = $this->getWishlist();
        $productId = $request->input('product_id');

        $wishlistItems = WishlistItems::where('wishlist_id', $wishlist->id)
            ->join('products', 'wishlist_items.product_id', '=', 'products.id')
            ->select(
                'wishlist_items.*', 
                'products.product_name',
                'products.description',
                'products.price'
            )->get();


        $wishlistItem = $wishlistItems->where('product_id', $productId)->first();

        if (is_null($wishlistItem)) {
            WishlistItems::Create([
                'wishlist_id' => $wishlist->id,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        } else {
            $wishlistItem->quantity = $wishlistItem->quantity + 1;
            $wishlistItem->save();
        }

        return redirect()->route('wishlist.view');

    }

    public function removeFromWishlist(Request $request)
    {

        $newQuantity = $request->input('quantity');
        $productId = $request->input('product_id');
        $wishlist = $this->getWishlist();

        $wishlistItems = WishlistItems::where('wishlist_id', $wishlist->id)
            ->join('products', 'wishlist_items.product_id', '=', 'products.id')
            ->select(
                'wishlist_items.*', // Select all wishlist item fields
                'products.product_name',
                'products.description',
                'products.price'
            )->get();

        $wishlistItem = $wishlistItems->where('product_id', $productId)->first();

        $wishlistItem->delete();

        return redirect()->route('wishlist.view');
    }

}