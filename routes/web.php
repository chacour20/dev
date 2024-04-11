<?php

use App\Models\Product;
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

Route::get('/', function () {
    $product = Product::latest()->paginate(10);
    return view('welcome',compact('product'));
});

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/new',[ProductController::class,'new'])->name('product.new');
Route::post('/product/create',[ProductController::class,'store'])->name('product.store');