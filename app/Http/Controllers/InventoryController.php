<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class InventoryController extends Controller
{
    //
    public function view()
    {
        return view('admin.inventory');

        $products = Products::query();
        $products = $products->get();
    }

}
