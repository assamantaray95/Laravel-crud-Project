<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
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

Route::get('/', [productController::class,'index'])->name('products.index');
Route::get('/products/create', [productController::class,'create'])->name('products.create');
Route::post('/products/store', [productController::class,'store'])->name('products.store');
Route::get('/products/edit/{id}', [productController::class,'edit']);
Route::put('/products/update/{id}', [productController::class,'update']);
Route::delete('/products/delete/{id}', [productController::class,'delete']);



