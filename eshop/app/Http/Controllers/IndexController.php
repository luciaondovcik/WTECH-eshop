<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(8)->get();
        $favouriteCategories = Category::inRandomOrder()->take(4)->get();
        return view('index',compact('categories', 'products', 'favouriteCategories'));
    }
}
