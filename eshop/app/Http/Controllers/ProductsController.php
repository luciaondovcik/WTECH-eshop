<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Response;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $btnName = 'Nás :)';
        $categories = Category::all();

        if(request()->category == "zlavy"){
            $selected_category = -1;
            $products = Product::where('discount', '>', 0);
        }else {
            $selected_category = Category::where('slug', request()->category)->first();
            $products = Product::where('category_id', $selected_category->id);
        }

        if (request()->orderBy) {
            $products = $products->orderBy(request()->orderBy, request()->type);
            if (request()->orderBy == 'name' && request()->type == 'asc')
                $btnName = 'Názov - A až Z';
            else if (request()->orderBy == 'name' && request()->type == 'desc')
                $btnName = 'Názov - Z až A';
            else if (request()->orderBy == 'price' && request()->type == 'asc')
                $btnName = 'Cena - vzostupne';
            else if (request()->orderBy == 'price' && request()->type == 'desc')
                $btnName = 'Cena - zostupne';
        }

        $brands = collect();
        $colors = collect();
        foreach($products->get() as $product) {
            if (!$brands->contains('name', $product->brands->name))
                $brands->push($product->brands);
            if (!$colors->contains($product->color))
                $colors->push($product->color);
        }

        //bocny filter
        if(request()->filterBrand){
            $products = $products->whereIn('brand_id', request()->filterBrand);
        }
        if(request()->filterColor){
            $products = $products->whereIn('color', request()->filterColor);
        }
        if(request()->filterAvailability){
            $products = $products->whereIn('availability', request()->filterAvailability);
        }
        if(request()->minval || request()->maxval){
            $priceMin = request()->minval;
            $priceMax = request()->maxval;
            $products = $products->whereBetween('price', [$priceMin, $priceMax]);
        }else{
            $priceMin = 0;
            $priceMax = 1000;
        }

        $products = $products->paginate(12);
        $request = request();
        return view('products', compact('products', 'categories', 'selected_category', 'brands', 'colors', 'btnName', 'request' ,'priceMax', 'priceMin'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $productSlug)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
