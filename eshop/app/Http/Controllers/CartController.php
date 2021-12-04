<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\TempCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $last = DB::table('temp_carts')->where('user_id', '=', Auth::id())->get()->last();
        if($last){
            Cart::destroy();
            $cart = unserialize($last->content);
            foreach($cart as $item) {
                Cart::add($item[0],$item[1],$item[2],$item[3],['pslug'=>$item[4],'cslug'=>$item[5],'image'=>$item[6]])->associate('app\models\Product');
            }
        }else{
            Cart::destroy();
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
//        if (Auth::check()) {
////            $last = DB::table('temp_carts')->where('user_id', '=', Auth::id())->get()->last();
////            if($last){
////                $cart = unserialize($last->content);
////                foreach($cart as $item) {
////                    Cart::add($item[0],$item[1],$item[2],$item[3],['pslug'=>$item[4],'cslug'=>$item[5],'image'=>$item[6]])->associate('app\models\Product');
////                }
////            }
//
//            if (Cart::count()<1) {
//                Cart::add($request->id, $request->name, $request->qty, $request->price, ['pslug' => $request->pslug, 'cslug' => $request->cslug, 'image'=> $request->image])->associate('app\models\Product');
//                return redirect()->route('products.index', [$request->cslug])->with('success', 'Produkt úspešne vložený do košíka!');
//            }
//            // if cart not empty then check if this product exist then increment quantity
//            if (isset($cart[$request->id])) {
//                $cart[$request->id]['quantity'] += $request->qty;
//                $request->session()->put('cart'.Auth::id(), $cart);
//                Cart::add($request->id, $request->name, $request->qty, $request->price, ['pslug' => $request->pslug, 'cslug' => $request->cslug, 'image'=> $request->image])->associate('app\models\Product');
//                return redirect()->route('products.index', [$request->cslug])->with('success', 'Produkt úspešne vložený do košíka!');
//            }
//            // if item not exist in cart then add to cart
//            $cart[$request->id] = [
//                "id" => $request->id,
//                "name" => $request->name,
//                "quantity" => $request->qty,
//                "price" => $request->price,
//                'pslug' => $request->pslug,
//                'cslug' => $request->cslug,
//                'image' => $request->image
//            ];
//            $request->session()->put('cart'.Auth::id(), $cart);
//        }

        Cart::add($request->id,$request->name,$request->qty,$request->price,['pslug'=>$request->pslug,'cslug'=>$request->cslug, 'image'=> $request->image])->associate('app\models\Product');
        if (Auth::check()) {
            if(Cart::count()>0){
                $stack = array();
                foreach(Cart::content() as $item){
                    $inner = array($item->id,$item->name,$item->qty,$item->price,$item->options->pslug,$item->options->cslug,$item->options->image);
                    array_push($stack,$inner );
                }
                $content = serialize($stack);

                $tempcart = TempCart::where('user_id',Auth::id())->first();
                if($tempcart){
                    $tempcart->content = $content;
                    $tempcart->save();
                }else{
                    TempCart::create([
                        'user_id' => Auth::id(),
                        'content' => $content
                    ]);
                }
            }
        }
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
        Cart::remove($id);
        if (Auth::check()) {
            if(Cart::count()>0){
                $stack = array();
                foreach(Cart::content() as $item){
                    $inner = array($item->id,$item->name,$item->qty,$item->price,$item->options->pslug,$item->options->cslug,$item->options->image);
                    array_push($stack,$inner );
                }
                $content = serialize($stack);

                $tempcart = TempCart::where('user_id',Auth::id())->first();
                if($tempcart){
                    $tempcart->content = $content;
                    $tempcart->save();
                }else{
                    TempCart::create([
                        'user_id' => Auth::id(),
                        'content' => $content
                    ]);
                }
            }else{
                TempCart::where('user_id',Auth::id())->delete();
            }
        }
        return back();
    }

    public function increaseqty($id)
    {
        $item = Cart::get($id);
        Cart::update($id, $item->qty+1);
        if (Auth::check()) {
            if(Cart::count()>0){
                $stack = array();
                foreach(Cart::content() as $item){
                    $inner = array($item->id,$item->name,$item->qty,$item->price,$item->options->pslug,$item->options->cslug,$item->options->image);
                    array_push($stack,$inner );
                }
                $content = serialize($stack);

                $tempcart = TempCart::where('user_id',Auth::id())->first();
                if($tempcart){
                    $tempcart->content = $content;
                    $tempcart->save();
                }else{
                    TempCart::create([
                        'user_id' => Auth::id(),
                        'content' => $content
                    ]);
                }
            }
        }

        return back();
    }

    public function decreaseqty($id)
    {
        $item = Cart::get($id);
        Cart::update($id, $item->qty-1);
        if (Auth::check()) {
            if(Cart::count()>0){
                $stack = array();
                foreach(Cart::content() as $item){
                    $inner = array($item->id,$item->name,$item->qty,$item->price,$item->options->pslug,$item->options->cslug,$item->options->image);
                    array_push($stack,$inner );
                }
                $content = serialize($stack);

                $tempcart = TempCart::where('user_id',Auth::id())->first();
                if($tempcart){
                    $tempcart->content = $content;
                    $tempcart->save();
                }else{
                    TempCart::create([
                        'user_id' => Auth::id(),
                        'content' => $content
                    ]);
                }
            }else{
                TempCart::where('user_id',Auth::id())->delete();
            }
        }
        return back();
    }

}
