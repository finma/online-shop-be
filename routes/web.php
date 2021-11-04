<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/products/checkSlug', [ProductController::class, 'checkSlug']);
Route::post('/products/create', [ProductController::class, 'store']);
Route::get('/products/{product:slug}', [ProductController::class, 'show']);
Route::get('/products/{product:slug}/edit', [ProductController::class, 'edit']);
Route::put('/products/{product:slug}', [ProductController::class, 'update']);
Route::delete('/products/{product:slug}', [ProductController::class, 'destroy']);