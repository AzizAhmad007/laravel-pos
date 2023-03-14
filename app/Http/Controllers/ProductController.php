<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

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
        try {
            $product = $request->validate([
                'name_product' => 'required',
                'description' => 'required',
                'price' => 'required',
                'stock' => 'required',
            ]);

            Product::create([
                'name_product' => $request->name_product,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);

            return response()->json([
                'message' => 'success',
                'statusCode' => 200,
                'data' => $product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e,
                'error' => 'Terjadi Kesalahan Silahkan coba lagi',
                'statusCode' => 400,
                'data' => null
            ]);
        }
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
        try {
            $product = $request->validate([
                'name_product' => 'required',
                'description' => 'required',
                'price' => 'required',
                'stock' => 'required',
            ]);

            $product = Product::find($id);

            $product->update([
                'name_product' => $request->name_product,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);

            return response()->json([
                'message' => 'success',
                'statusCode' => 200,
                'data' => $product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e,
                'error' => 'Terjadi Kesalahan',
                'statusCode' => 400,
                'data' => null
            ]);
        }
    }

    //----------DELETE DATA PRODUCT BEDASARKAN PARAMETER ID-------------
    public function destroy($id)
    {
        try {

            $product = Product::find($id);
            if ($product == null) {
                throw new Exception('data tidak ditemukan');
            }
            $product->delete();

            return response()->json([
                'message' => 'success',
                'statusCode' => 200,
                'data' => $product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e,
                'error' => 'Data tidak ditemukan',
                'statusCode' => 400,
                'data' => null
            ]);
        }
    }
}
