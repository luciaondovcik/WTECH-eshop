<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate(([
            'name' => 'required|max:255|unique:products,name',
            'slug' => 'required|max:255|unique:products,slug',
            'category' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'description' => 'required|max:65535',
        ]));

        Product::create([
            'brand_id' => $attributes['brand'],
            'name' => $attributes['name'],
            'slug' => $attributes['slug'],
            'price' => $attributes['price'],
            'discount' => $attributes['discount'],
            'category_id' => $attributes['category'],
            'color' => $attributes['color'],
            'availability' => 'dostupné',
            'description' => $attributes['description'],
        ]);

        session()->flash('success','Produkt bol pridaný!');

        return redirect('/admin');
    }

    public function delete(Request $request)
    {
        Product::where('id', $request->id)->delete();
        session()->flash('success','Produkt bol vymazaný!');
        return redirect('/admin');
    }

    public function edit(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        return view('editproduct',compact('product'));
    }

    public function update(Request $request)
    {

        $attributes = $request->validate(([
            'name' => 'required|max:255|unique:products,name,' . $request->id,
            'slug' => 'required|max:255|unique:products,slug,' . $request->id,
            'category' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'availability' => 'required',
            'description' => 'required|max:65535',
        ]));
        $category = Category::where('id', $attributes['category'])->first();
        $brand = Brand::where('id', $attributes['brand'])->first();
        $product = Product::where('id', $request->id)->first();
        $product->name = $attributes['name'];
        $product->slug = $attributes['slug'];
        $product->category_id = $category->id;
        $product->brand_id = $brand->id;
        $product->color = $attributes['color'];
        $product->price = $attributes['price'];
        $product->discount = $attributes['discount'];
        $product->availability = $attributes['availability'];
        $product->description = $attributes['description'];

        $product->save();

        session()->flash('success','Produkt bol upravený!');

        return redirect('/admin');
    }
}
