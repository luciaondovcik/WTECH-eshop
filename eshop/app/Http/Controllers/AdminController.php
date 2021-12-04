<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'productPictures' => 'required|max:5',
        ]));

        foreach($request->file('productPictures') as $file) {
            $fileArray = pathinfo($file->getClientOriginalName());
            $name = md5($fileArray['filename']) . '.' . $fileArray['extension'];
            $file->move(public_path().'/images/products/', $name);
            $imgData[] = $name;
        }

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
            'images' => $imgData
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
            'productPictures' => 'max:5',
        ]));

        $category = Category::where('id', $attributes['category'])->first();
        $brand = Brand::where('id', $attributes['brand'])->first();
        $product = Product::where('id', $request->id)->first();

        if(count($attributes)>9) {  //lebo setko je required okrem obrazkov takze budu vzdy chybat obrazky
            foreach ($request->file('productPictures') as $file) {
                $fileArray = pathinfo($file->getClientOriginalName());
                $name = md5($fileArray['filename']) . '.' . $fileArray['extension'];
                $file->move(public_path() . '/images/products/', $name);
                $imgData[] = $name;
            }
            $mergedImgs = array_merge($product->images, $imgData);
        }else{
            $mergedImgs = $product->images;
        }

        $product->name = $attributes['name'];
        $product->slug = $attributes['slug'];
        $product->category_id = $category->id;
        $product->brand_id = $brand->id;
        $product->color = $attributes['color'];
        $product->price = $attributes['price'];
        $product->discount = $attributes['discount'];
        $product->availability = $attributes['availability'];
        $product->description = $attributes['description'];
        $product->images = $mergedImgs;

        $product->save();

        session()->flash('success','Produkt bol upravený!');

        return redirect('/admin');
    }

    public function deleteImg(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $images = $product->images;
        $imgToDelete = $images[$request->key];
        unset($images[$request->key]);
        $product->images = $images;
        $product->save();
        File::delete('images/products/'.$imgToDelete);
        return redirect()->route('product.edit', ['id'=>$request->id]);
    }
}
