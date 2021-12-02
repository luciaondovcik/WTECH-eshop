<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\ShippingDetails;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;



class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('payment',compact('categories'));
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
    public function getId($model, $table, $value) {
        return $model::where($table, $value)->last()->id;
    }

    public function store(Request $request)
    {
//        dd($request);
        if (Auth::check()) {
            $id = Auth::id(); ///Neviem lognut userid
        } else {
            $id = -1;
        }
        $cart = ShoppingCart::create([
            'user_id' => $id,
            'order_price' => Cart::total(),
        ]);

        $products = Cart::content();
        foreach ($products as $product) {
            ShoppingCartItem::create([
                'product_id' => $product->id,
                'shopping_cart_id' => $cart->id,
                'quantity' => $product->qty,
            ]);
        }

        if ($request->optradio2 == 1) {
            $payment = 'card';
        } elseif ($request->optradio2 == 2) {
            $payment = 'bank_transfer';
        } elseif ($request->optradio2 == 3) {
            $payment = 'paypal';
        } else {
            $payment = 'viamo';
        }
        $last = DB::table('shipping_details')->where('user_id', '=', $id)->get()->last();
//        dd($last);
        Order::create([
            'shipping_id' => $request->optradio1,
            'shopping_cart_id' => $cart->id,
            'shipping_company_details_id' => -1,
            'shipping_details_id' => $last->id,
            'payment' => $payment,
            'discount_coupon' => 0,
        ]);
        return redirect()->route('thankyou.index');
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
        //
    }
}
