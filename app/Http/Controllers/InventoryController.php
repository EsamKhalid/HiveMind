<?php

namespace App\Http\Controllers;

use App\Models\StockOrder;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Supplier;

class InventoryController extends Controller
{
    //
    public function view(){
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

    public function show($id){

        $product = Products::findOrFail($id);
        return view('admin.order', ['product' => $product]); 
    }

    public function saveSupplier(Request $request) {

        $request->validate([
            'supplier_name' => 'required',
            'supplier_email' => 'required',
            'supplier_phone' => 'required',
        ]);
    }

    public function order(Request $request) {

        //$product = Products::findOrFail($id);

        $request->validate([
            'product_id' => 'required',
            //'supplier_id' => 'required',
            'stock_quantity' => 'required',
            'lead_time' => 'required',
            'supplier_name' => 'required',
            'supplier_email' => 'required',
            'supplier_phone' => 'required',
        ]);

        $supplier = Supplier::create([
            'supplier_name' => $request->supplier_name,
            'supplier_email' => $request->supplier_email,
            'supplier_phone' => $request->supplier_phone,
        ]);

        StockOrder::create([
            'product_id' => $request->product_id,
            'supplier_id' => $supplier->id,
            'stock_quantity' => $request->stock_quantity,
            'lead_time' => $request->lead_time,
            'order_date' => now(),
        ]);

        $stock = Products::findOrFail($request->product_id);
        $stock->stock_level = $stock->stock_level + $request->stock_quantity;
        $stock->save();

    }

}