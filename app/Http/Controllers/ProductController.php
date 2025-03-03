<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
        public function list(Request $request){
            
        $search = $request->input('search');
        $filter = $request->input('filter');

        $categoryButton = $request->input('categoryButton');

        $products = Products::query();

        if($categoryButton){
            $products->where('product_type', '=', $categoryButton);
        }

        if ($search) {
            $products->where('product_name', 'like', '%' . $search . '%');
        }

        if ($filter && $filter != 'none') {
            $products->where('product_type', '=', $filter);
        }

        $products = $products->get();

        return view('products.products', compact('products', 'search', 'filter'));  
    }

    public function inventory_products()
    {
        $inv_products = Products::all();

        // FILTER ICONS ARE BEING PASSED THROUGH HERE
        // TO REDUCE COMPLEXIITY IN THE BLADE

        // PLUS, THIS ELMINATES THE NEED FOR USING JS
        // WHICH IN THIS CASE, IT NEEDS TO LIASSE WITH THE DB PROPERLY

        $TYPE_ICONS = 
        [
            'BEAUTY' => 'fa-spa',
            'HEALTH' => 'fa-heartbeat',
            'HAIRCARE' => 'fa-air-freshener',
            'SKINCARE' => 'fa-pump-soap',
            'BODYCARE' => 'fa-shower',
            'MERCH' => 'fa-tshirt',
            'HOME' => 'fa-home'
        ];  

        return view('inventory.inventory', 
        [
            'products' => $inv_products,
            'TYPE_ICONS' => $TYPE_ICONS
        ]);
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);

        $reviews = $product->reviews()->with('user')->get();
        
        return view('products.show', ['product' => $product, 'reviews' => $reviews]);
    }
}
