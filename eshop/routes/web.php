<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

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
Route::get('/search', 'App\Http\Controllers\IndexController@search');

Route::resource('/', IndexController::class);


Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');;
Route::get('/admin/product/create', [AdminController::class, 'create'])->middleware('admin');
Route::post('/admin/product/store', [AdminController::class, 'store'])->middleware('admin');
Route::post('/admin/product/update', 'App\Http\Controllers\AdminController@update')->name('product.update')->middleware('admin');
Route::get('/admin/product/delete', 'App\Http\Controllers\AdminController@delete')->name('product.delete')->middleware('admin');
Route::get('/admin/product/edit', 'App\Http\Controllers\AdminController@edit')->name('product.edit')->middleware('admin');
Route::get('/admin/product/edit/deleteImg', 'App\Http\Controllers\AdminController@deleteImg')->name('product.deleteImg')->middleware('admin');


Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/registration', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/registration', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/cart','App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart','App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/cart/{product}','App\Http\Controllers\CartController@destroy')->name('cart.destroy');

Route::post('/cart/{product}','App\Http\Controllers\CartController@decreaseqty')->name('cart.decreaseqty');
Route::get('/cart/{product}','App\Http\Controllers\CartController@increaseqty')->name('cart.increaseqty');

Route::get('/payment','App\Http\Controllers\PaymentController@index')->name('payment.index');
Route::get('/thankyou','App\Http\Controllers\ThankyouController@index')->name('thankyou.index');

Route::get('/checkout','App\Http\Controllers\CheckoutController@index')->name('checkout.index');
Route::post('/checkout','App\Http\Controllers\CheckoutController@store')->name('checkout.store');

Route::get('/{category}/{product}', 'App\Http\Controllers\ProductsController@show');

Route::get('/{category}', 'App\Http\Controllers\ProductsController@index')->name('products.index');
