<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {;
        $categories = Category::all();
        if (Auth::check()){
            $userCart = Session::get('cart'.Auth::id())->getContent();
            $totalPrice = 0;
            foreach($userCart as $item) {
                $totalPrice += ($item->price *$item->qty);
            }
            return view('cart',compact('categories', 'userCart', 'totalPrice'));
        }
        $totalPrice = Cart::total();
        return view('cart',compact('categories', 'totalPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//<<<<<<< HEAD
////        dd($request);
//        Cart::add($request->id,$request->name,$request->qty,$request->price,['pslug'=>$request->pslug,'cslug'=>$request->cslug])->associate('app\models\Product');
//=======
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                $request->id => [
                    "name" => $request->name,
                    "quantity" => $request->qty,
                    "price" => $request->price,
                ]
            ];
            session()->put('cart', $cart);
            Cart::add($request->id,$request->name,$request->qty,$request->price)->associate('app\models\Product');
            return redirect()->route('cart.index')->with('success', 'Produkt úspešne vložený do košíka!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->qty;
            session()->put('cart', $cart);
            Cart::add($request->id,$request->name,$request->qty,$request->price)->associate('app\models\Product');
            return redirect()->route('cart.index')->with('success', 'Produkt úspešne vložený do košíka!');
        }
        // if item not exist in cart then add to cart
        $cart[$request->id] = [
            "name" => $request->name,
            "quantity" => $request->qty,
            "price" => $request->price,
        ];
        session()->put('cart', $cart);
        Cart::add($request->id,$request->name,$request->qty,$request->price)->associate('app\models\Product');
        return redirect()->route('cart.index')->with('success', 'Produkt úspešne vložený do košíka!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Cart::remove($id);
        return back();
    }

    public function increaseqty($id)
    {
        $item = Cart::get($id);

        Cart::update($id, $item->qty+1);
        return back();
    }

    public function decreaseqty($id)
    {
        $item = Cart::get($id);

        Cart::update($id, $item->qty-1);
        return back();
    }

}
