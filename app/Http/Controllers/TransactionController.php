<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {

        //$data = Transaction::with('getcustomer')->get();
        //dd($data->toArray());
        //foreach ($data as $key => $value)
        //{
        //echo $value->getcustomer->name_customer;
        //}

        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'cashier_id'  => 'required',
                'customer_id' => 'required',
                'product_id'  => 'required',
                'qty'         => 'required|min_digits=1'
            ]);

            $priceProduct = DB::connection('mysql')->select("select * from products where id = '$request->product_id'");

            $data = new Transaction();
            $data->cashier_id = $request->cashier_id;
            $data->customer_id = $request->customer_id;
            $data->product_id = $request->product_id;
            $data->qty = $request->qty;
            //total kuantitas dan harga product
            $data->price = $priceProduct[0]->price * $request->qty;
            $data->save();

            return response()->json([
                'message' => 'success',
                'statusCode' => 200,
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e,
                'error' => $e->getMessage(),
                'statusCode' => 400,
                'data' => null
            ]);
        }
    }
}
