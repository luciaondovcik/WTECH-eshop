<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if(auth()->user()->email === 'lucia1234@gmail.com'){
                return redirect('/admin')->with('success', 'Serus!');
            }
        }
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(8)->get();
        $favouriteCategories = Category::inRandomOrder()->take(4)->get();
        return view('index',compact('categories', 'products', 'favouriteCategories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $query = request()->input('query');
        $products = Product::where('name', 'ilike', '%'.$query.'%')->get();
        return view('filter', compact('products', 'categories'));
    }
}
