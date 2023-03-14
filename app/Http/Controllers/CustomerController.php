<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return $customer;
    }

    public function store(Request $request)
    {
        Customer::create([
            'name_customer' => $request->name_customer,
            'no_telp' => $request->no_telp,
            'address' => $request->address,
        ]);

        return response()->json(['message' => 'success']);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return $customer;
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->update([
            'name_customer' => $request->name_customer,
            'no_telp' => $request->no_telp,
            'address' => $request->address,
        ]);

        return response()->json(['message' => 'update success']);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        return response()->json(['message' => 'delete success']);
    }
}
