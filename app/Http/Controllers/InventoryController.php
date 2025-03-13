<?php

namespace App\Http\Controllers;

use App\Models\StockOrder;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Supplier;

class InventoryController extends Controller
{
    //
    public function list(Request $request){
        // $basket = Basket::where('user_id', $user->id)->first();
       // $product = Products::where('product_id', $product->id)->first();
        // Return the basket view with basket items
        //return view('basket.basket', ['basketItems' => $basketItems]);

        $search = $request->search;
        $filter = $request->filter;

        echo $search;

        $products = Products::query();
        $products = $products->get();

        return view('admin.inventory', ['products' => $products]);

        //$products = Products::query();
        //$products = $products->get();
    }

    public function show($id){

        $product = Products::findOrFail($id);
        $suppliers = Supplier::all();
        //return view('admin.order', ['product' => $product]); 
        return view('admin.order', compact('product', 'suppliers'));
    }

    public function order(Request $request) {

        //$product = Products::findOrFail($id);

        $request->validate([
            'product_id' => 'required',
            'supplier_id' => 'required',
            'stock_quantity' => 'required|integer',
            'lead_time' => 'required|integer',
        ]);

        StockOrder::create([
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'stock_quantity' => $request->stock_quantity,
            'lead_time' => $request->lead_time,
            'order_date' => now(),
        ]);

        $stock = Products::findOrFail($request->product_id);
        $stock->stock_level = $stock->stock_level + $request->stock_quantity;
        $stock->save();

        return redirect()->route('admin.inventory')->with('success', 'Order placed successfully');

    }

}