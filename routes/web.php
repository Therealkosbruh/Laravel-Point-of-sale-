<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


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
    return view('main_page');
});


Route::get('sign_page', [App\Http\Controllers\UserController::class,'index'])->name('user.authentification');
Route::post('register', [App\Http\Controllers\UserController::class,'create'])->name('user.create');
Route::post('login', [App\Http\Controllers\LoginController::class,'login'])->name('loginPost');
Route::get('user_profile', [App\Http\Controllers\UserController::class,'show'])->name('user.profile');


Route::get('user_cart', [App\Http\Controllers\CartController::class,'index'])->name('user.cart');
Route::post('cart_add', [App\Http\Controllers\CartController::class,'add'])->name('cart.add');
Route::delete('cart/{product_id}', [App\Http\Controllers\CartController::class,'destroy'])->name('cart.destroy');

Route::post('create_order', [App\Http\Controllers\OrderController::class,'create'])->name('order.create');

Route::group(['namespace'=> 'Product'], function () { 
    Route::get('pr_index', function () {
        return view('Product/index');
    });
    Route::get('Product/index', [App\Http\Controllers\ProductController::class,'index'])->name('product.index');
    Route::get('Product/{product}', [App\Http\Controllers\ProductController::class,'show'])->name('product.show');
});

Route::get('Orders/{order}',[App\Http\Controllers\OrderController::class,'show'])->name('order.show');
Route::post('orders/{order}/close', [App\Http\Controllers\OrderController::class,'update'])->name('order.close');

