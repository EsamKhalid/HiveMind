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
        $search = $request->search;
        $filter = $request->filter;
        $stockLevel = $request->stockLevel;

        $products = Products::query();

        if($search){
            $products->where('product_name', 'like', '%' . $search . '%');
        }
        if ($filter && $filter != 'none') {
            $products->where('product_type', '=', $filter);
        }

        if ($stockLevel) {
            if ($stockLevel == 'out_of_stock') {
                $products->where('stock_level', '=', 0);
            } elseif ($stockLevel == 'low_stock') {
                $products->where('stock_level', '>', 0)->where('stock_level', '<', 35);
            } elseif ($stockLevel == 'in_stock') {
                $products->where('stock_level', '>=', 35);
            }
        }

        $products = $products->get();

        return view('admin.inventory', ['products' => $products,'category'=> $filter]);
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

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.inventory')->with('success', 'Product removed successfully.');
    }

    public function editView($id)
    {
        $product = Products::findOrFail($id);
        return view('admin.editInventory', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock_level' => 'required|integer',
            'product_type' => 'required|string',
            'description' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'recipes' => 'nullable|string',
            'directions' => 'nullable|string',
        ]);

        $product = Products::find($id);
        $product->update([
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'stock_level' => $request->input('stock_level'),
            'product_type' => $request->input('product_type'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'recipes' => $request->input('recipes'),
            'directions' => $request->input('directions'),
        ]);

        return redirect()->route('admin.inventory')->with('success', 'Product updated successfully.');
    }

}