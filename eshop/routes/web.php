<?php

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

Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/registration', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/registration', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/cart','App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart','App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/cart/{product}','App\Http\Controllers\CartController@destroy')->name('cart.destroy');

Route::get('/payment','App\Http\Controllers\PaymentController@index')->name('payment.index');

Route::get('/checkout','App\Http\Controllers\CheckoutController@index')->name('checkout.index');

Route::get('/{category}/{product}', 'App\Http\Controllers\ProductsController@show');

Route::get('/{category}', 'App\Http\Controllers\ProductsController@index')->name('products.index');


Route::get('/thankyou', function () {
    return view('thankyou');
});

Route::get('/payment', function () {
    return view('payment');
});

