<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductReviews;

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

   

   public function show($id)
    {
        $product = Products::findOrFail($id);
        
        $reviews = ProductReviews::query();

        $reviews = $reviews->where('product_id', '=', $product->id);

        $reviews = $reviews->get();

        //echo $reviews;

        //$reviews = ProductReviews::all();

        return view('products.show', ['product' => $product], ['reviews' => $reviews]); 
    }
}
