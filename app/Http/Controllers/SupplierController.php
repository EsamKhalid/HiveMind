<?php

namespace App\Http\Controllers;
use App\Models\Supplier;

use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function view(){
        return view('admin.supplier');
    }

    public function addSupplier(Request $request) {

        $request->validate([
            'supplier_name' => 'required',
            'supplier_email' => 'required',
            'supplier_phone' => 'required',
        ]);

        $supplier = Supplier::create([
            'supplier_name' => $request->supplier_name,
            'supplier_email' => $request->supplier_email,
            'supplier_phone' => $request->supplier_phone,
        ]);

        return redirect()->route('admin.inventory');
    }

    public function list(Request $request) {
        $search = $request->input('search');
        $filter = $request->input('filter');

        $suppliers = Supplier::query();

        if ($search) {
            $suppliers->where('supplier_name', 'like', '%' . $search . '%');
        }

        if ($filter && $filter != 'none') {
            $suppliers->where('supplier_name', '=', $filter);
        }

        $suppliers = $suppliers->get();

        return view('admin.supplier', compact('suppliers', 'search', 'filter'));
    }

}