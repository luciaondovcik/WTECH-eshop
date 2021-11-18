<?php

use App\Models\Category;
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

//Route::get('/', function () {
//    return view('index');
//});

Route::resource('/', IndexController::class);

Route::get('/gitary', function () {
    return view('products');
});

Route::get('/cart', function () {
    return view('cart');
});

//Route::get('/{category}', function(Category $category){
//    return view('products', [
//        'products' => $category->products
//    ]);
//});

Route::resource('/{category}', ProductsController::class);

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
