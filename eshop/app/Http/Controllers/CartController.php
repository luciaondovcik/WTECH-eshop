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
    {
        $categories = Category::all();
        if (Auth::check() && \Session::get('cart'.Auth::id())){
//            dd(\Session::get('cart'.Auth::id()));
            Cart::destroy();
            $userCart =\Session::get('cart'.Auth::id());
            foreach($userCart as $item) {
                Cart::add($item['id'],$item['name'],$item['quantity'],$item['price'],['pslug'=>$item['pslug'],'cslug'=>$item['cslug'], 'image'=> $item['image']])->associate('app\models\Product');
            }
            return view('cart',compact('categories', 'userCart'));
        }

        return view('cart',compact('categories'));
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
        if (Auth::check()) {
            $cart = $request->session()->get('cart'.Auth::id());
            if (!$cart) {
                $cart = [
                    $request->id => [
                        "id" => $request->id,
                        "name" => $request->name,
                        "quantity" => $request->qty,
                        "price" => $request->price,
                        'pslug' => $request->pslug,
                        'cslug' => $request->cslug,
                        'image' => $request->image
                    ]
                ];
                $request->session()->put('cart'.Auth::id(), $cart);
                Cart::add($request->id, $request->name, $request->qty, $request->price, ['pslug' => $request->pslug, 'cslug' => $request->cslug, 'image'=> $request->image])->associate('app\models\Product');
                return redirect()->route('products.index', [$request->cslug])->with('success', 'Produkt úspešne vložený do košíka!');
            }
            // if cart not empty then check if this product exist then increment quantity
            if (isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] += $request->qty;
                $request->session()->put('cart'.Auth::id(), $cart);
                Cart::add($request->id, $request->name, $request->qty, $request->price, ['pslug' => $request->pslug, 'cslug' => $request->cslug, 'image'=> $request->image])->associate('app\models\Product');
                return redirect()->route('products.index', [$request->cslug])->with('success', 'Produkt úspešne vložený do košíka!');
            }
            // if item not exist in cart then add to cart
            $cart[$request->id] = [
                "id" => $request->id,
                "name" => $request->name,
                "quantity" => $request->qty,
                "price" => $request->price,
                'pslug' => $request->pslug,
                'cslug' => $request->cslug,
                'image' => $request->image
            ];
            $request->session()->put('cart'.Auth::id(), $cart);
        }

        Cart::add($request->id,$request->name,$request->qty,$request->price,['pslug'=>$request->pslug,'cslug'=>$request->cslug, 'image'=> $request->image])->associate('app\models\Product');
        return redirect()->route('products.index', [$request->cslug])->with('success', 'Produkt úspešne vložený do košíka!');
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
        if (Auth::check()) {
            $cart = \Session::get('cart' . Auth::id());
            \Session::forget('cart' . Auth::id());
            foreach($cart as $key=>$item) {
                if($item['id'] == Cart::get($id)->id){
                    unset($cart[$key]);
                    break;
                }
            }
            session()->put('cart'.Auth::id(), $cart);
        }
        Cart::remove($id);
        return back();
    }

    public function increaseqty($id)
    {
        if (Auth::check()) {
            $cart = \Session::get('cart' . Auth::id());
            \Session::forget('cart' . Auth::id());
            foreach($cart as $key=>$item) {
                if($item['id'] == Cart::get($id)->id){
                    $cart[$key]['quantity']++;
                    break;
                }
            }
//            dd($cart);
            session()->put('cart'.Auth::id(), $cart);
        }
        $item = Cart::get($id);
        Cart::update($id, $item->qty+1);
        return back();
    }

    public function decreaseqty($id)
    {
        if (Auth::check()) {
            $cart = \Session::get('cart' . Auth::id());
            \Session::forget('cart' . Auth::id());
            foreach($cart as $key=>$item) {
                if($item['id'] == Cart::get($id)->id){
                    $cart[$key]['quantity']--;
                    break;
                }
            }
//            dd($cart);
            session()->put('cart'.Auth::id(), $cart);
        }
        $item = Cart::get($id);
        Cart::update($id, $item->qty-1);
        return back();
    }

}
