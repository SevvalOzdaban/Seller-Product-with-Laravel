<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
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
    return view('welcome');
});
Route::get('/', [SellerController::class, 'index'])->name('index');
// Route::post('/', [SellerController::class, 'getProductsBySeller'])->name('getProductsBySeller');
Route::post('/deneme', [SellerController::class, 'getProductsBySeller'])->name('getProductsBySeller');
Route::post('/product', [SellerController::class, 'getProductsToName'])->name('getProductsToName ');
