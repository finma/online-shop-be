<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerController;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/', function () {
    return view('admin.index', [
        'customers' => Customer::count(),
        'products' => Product::count(),
        'transactions' => Transaction::count(),
        'categories' => Category::count(),
    ]);
})->middleware('auth');

Route::get('/transactions', [TransactionController::class, 'index']);
Route::post('/transactions/{transaction}/reject', [TransactionController::class, 'reject']);
Route::post('/transactions/{transaction}/accept', [TransactionController::class, 'accept']);

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
Route::get('/products/checkSlug', [ProductController::class, 'checkSlug'])->middleware('auth');
Route::post('/products/create', [ProductController::class, 'store'])->middleware('auth');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->middleware('auth');
Route::get('/products/{product:slug}/edit', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/products/{product:slug}', [ProductController::class, 'update'])->middleware('auth');
Route::delete('/products/{product:slug}', [ProductController::class, 'destroy'])->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('auth');
Route::get('/categories/checkSlug', [CategoryController::class, 'checkSlug'])->middleware('auth');
Route::post('/categories/create', [CategoryController::class, 'store'])->middleware('auth');
Route::get('/categories/{category:slug}/edit', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/categories/{category:slug}', [CategoryController::class, 'update'])->middleware('auth');
Route::delete('/categories/{category:slug}', [CategoryController::class, 'destroy'])->middleware('auth');

Route::get('/payments', [PaymentController::class, 'index'])->middleware('auth');
Route::get('/payments/create', [PaymentController::class, 'create'])->middleware('auth');
Route::get('/payments/checkSlug', [PaymentController::class, 'checkSlug'])->middleware('auth');
Route::post('/payments/create', [PaymentController::class, 'store'])->middleware('auth');
Route::get('/payments/{payment:slug}/edit', [PaymentController::class, 'edit'])->middleware('auth');
Route::put('/payments/{payment:slug}', [PaymentController::class, 'update'])->middleware('auth');
Route::delete('/payments/{payment:slug}', [PaymentController::class, 'destroy'])->middleware('auth');

Route::get('/customers', [CustomerController::class, 'index']);
