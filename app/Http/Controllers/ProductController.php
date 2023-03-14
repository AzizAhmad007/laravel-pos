<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //-----------MENAMPILKAN SEMUA PRODUCT------------
    public function index()
    {
        $product = Product::all();
        return $product;
    }

    //-----------MASUKAN DATA PRODUCT--------------
    public function store(Request $request)
    {
        Product::create([
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return response()->json(['message' => 'success']);
    }

    //-----------MENCARI DATA PRODUCT BEDASARKAN ID--------------
    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    //-----------UPDATE DATA PRODUCT BEDASARKAN PARAMETER ID-------------
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update([
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return response()->json(['message' => 'update success']);
    }

    //----------DELETE DATA PRODUCT BEDASARKAN PARAMETER ID-------------
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return response()->json(['message' => 'delete success']);
    }
}
