<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//-------------------Product-----------------------
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::post('/insert-product', [ProductController::class, 'store']);
Route::put('/update-product/{id}', [ProductController::class, 'update']);
Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);

//-------------------Customer-----------------------
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::post('/insert-customer', [CustomerController::class, 'store']);
Route::put('/update-customer/{id}', [CustomerController::class, 'update']);
Route::delete('/delete-customer/{id}', [CustomerController::class, 'destroy']);

//-------------------Supplier-----------------------
Route::post('/insert-supplier', [SupplierController::class, 'store']);


//-------------------Transaction---------------------
Route::get('/transaction', [TransactionController::class, 'index']);
Route::post('/insert-transaction', [TransactionController::class, 'store']);


Route::post('/insert-user', [UserController::class, 'store']);
