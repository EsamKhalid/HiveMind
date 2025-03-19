<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    //

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
}