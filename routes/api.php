<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/transactions', [TransactionController::class, 'indexAPI']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::get('/transactions/{transaction:slug}/detail', [TransactionController::class, 'detail']);

Route::get('/products', [ProductController::class, 'indexAPI']);
Route::get('/products/{product:slug}/detail', [ProductController::class, 'detail']);

Route::get('/payments', [PaymentController::class, 'indexAPI']);
