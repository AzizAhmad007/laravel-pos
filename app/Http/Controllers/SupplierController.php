<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        Supplier::create([
            'name_supplier' => $request->name_supplier,
            'email' => $request->email,
            'name_product_supplier' => $request->name_product_supplier,
            'number_supplier' => $request->number_supplier,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return response()->json(['message' => 'success']);
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
        return $supplier;
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);

        $supplier->update([
            'name_supplier' => $request->name_supplier,
            'email' => $request->email,
            'name_product_supplier' => $request->name_product_supplier,
            'number_supplier' => $request->number_supplier,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return response()->json(['message' => 'update success']);
    }
}
