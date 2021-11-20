<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\IndexController;

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

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/{category}/{product}', 'App\Http\Controllers\ProductsController@show');

Route::get('/{category}', 'App\Http\Controllers\ProductsController@index')->name('products.index');


Route::get('/registration', function () {
    return view('registration');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/thankyou', function () {
    return view('thankyou');
});

Route::get('/payment', function () {
    return view('payment');
});
