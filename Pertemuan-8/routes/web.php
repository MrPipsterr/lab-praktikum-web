<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [ProductController::class , 'index'])->name('home');
Route::get('/product', [ProductController::class , 'index']);

Route::get('/product/detail/{productCode}', [ProductController::class, 'showProductDetail'])->name('details');
Route::get('/product/line/{productLines}', [ProductController::class, 'showByProductLine'])->name('product.line');



