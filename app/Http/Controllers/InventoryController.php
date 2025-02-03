<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class InventoryController extends Controller
{
    //
    public function view()
    {
        // $basket = Basket::where('user_id', $user->id)->first();
       // $product = Products::where('product_id', $product->id)->first();
        // Return the basket view with basket items
        //return view('basket.basket', ['basketItems' => $basketItems]);

        $products = Products::query();
        $products = $products->get();

        return view('admin.inventory', ['products' => $products]);

        //$products = Products::query();
        //$products = $products->get();
    }

}
