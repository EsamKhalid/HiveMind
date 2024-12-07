<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Baskets;
use App\Models\BasketItems;
use App\Models\Products;

use App\Models\Users;

use function PHPSTORM_META\map;

class BasketController extends Controller
{

    /** Display the user's basket */
    public function view()
    {
        // Get the authenticated user

       //$user = Users::query()->where('id', 1)->first();
       $user = Users::where('id', 1)->first();

        if (!$user){return "user not found";}
        
        // Retrieve the user's basket
        //$basket = Baskets::where('user_id', 1);
        //$basketItems = Baskets::where('user_id', 1)->first()->items;
        
        $basket = $user->basket;
        //$basketItems = $basket ? $basket->items : [];
        $basketItems = BasketItems::where('basket_id', $basket->id)
           ->join('products','basket_items.product_id','=','products.id')
           ->select(
            'basket_items.*', //.* means it selects all basket item fields
            'products.product_name',
            'products.description',
            'products.price'
           )->get();
        //What I've done above is manually fetched the products.
        //This could've been avoided if only belongsTo was working but I kept getting errors.
        //dd($basketItems); //it stops the execution and prints basketitems
       
/*          foreach ($basketItems as $item) {
            echo 'Product ID: ' . $item->product_id . '<br>';
            echo 'Quantity: ' . $item->quantity . '<br>';
        } */

        // Return the basket view with basket items
        return view('basket.basket', ['basketItems' => $basketItems]);
        
    }

    /** Add a product to the basket */
    public function addToBasket(Request $request, $productID)
    {
        // simulating a logged-in user. no auth for now
        $user = Users::where('id',1)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'You must be logged in to add items to the basket');
        }

        // Find or create the user's basket
        $basket = Baskets::firstOrCreate(['user_id' => $user->id]);

        // Add or update the product in the basket
        BasketItems::updateOrCreate(
            ['basket_id' => $basket->id, 'product_id' => $productID],
            ['quantity' => $request->input('quantity', 1)]
        );

        return redirect()->route('basket.view')->with('success', 'Product has been added to the basket');
    }

    /** Remove a product from the basket */
    public function removeFromBasket(Request $request, $productID)
    {
        // simulating a logged in user id 1
        $user = Users::where('id',1)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'You must be logged in to modify the basket contents');
        }

        // Retrieve the user's basket
        $basket = Baskets::where('user_id', $user->id)->first();

        if ($basket) {
            // Remove the specified product from the basket
            $basket->items()->where('product_id', $productID)->delete();
        }

        return redirect()->route('basket.view')->with('success', 'Product removed from the basket');
    }
}
/**Test1 */