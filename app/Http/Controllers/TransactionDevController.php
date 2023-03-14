<?php

namespace App\Http\Controllers;

use App\Http\Models\TransactionDev;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionDev as ModelsTransactionDev;
use Illuminate\Support\Facades\DB;

class TransactionDevController extends Controller
{
    public function index()
    {

        $data = ModelsTransactionDev::with('getcustomer')->get();
        dd($data->toArray());
        foreach ($data as $key => $value) {
            echo $value->getcustomer->name_customer;
        }
    }
}
