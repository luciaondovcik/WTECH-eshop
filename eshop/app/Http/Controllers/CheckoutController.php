<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\ShippingCompanyDetails;
use App\Models\ShippingDetails;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('checkout',compact('categories'));
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
//        dd($request);
        if (Auth::check()){
            $id = Auth::id(); ///Neviem lognut userid
        }
        else{
            $id = -1;
        }

        ShippingDetails::create([
            'user_id' => $id,
            'name' => $request->c_fname,
            'surname' => $request->c_lname,
            'phone_number' => $request->c_phone,
            'address' => $request->c_address,
            'zip_code' => $request->c_postal_zip,
            'city' => $request->c_state_city,
            'country' => $request->c_state_country,
        ]);

        if($request->c_diff_fname != ""){
            ShippingCompanyDetails::create([
                'name' => $request->c_diff_fname,
                'surname' => $request->c_diff_lname,
                'company_name' => $request->c_diff_companyname,
                'email' => $request->c_diff_email_address,
                'phone_number' => $request->c_diff_phone,
                'address' => $request->c_diff_address,
                'zip_code' => $request->c_diff_postal_zip,
                'city' => $request->c_diff_state_city,
                'country' => $request->c_diff_state_country,
            ]);
        }


//        if($request->c_create_account){
//            $attributes = request()->validate(([
//                'c_diff_email_address' => 'required|email|max:255|unique:users,email',
//                'c_account_password' => 'required|min:7|max:255',
//            ]));
//
//            $user = User::create([
//                'email' => $attributes['c_diff_email_address'],
//                'password' => bcrypt($attributes['c_account_password']),
//                'salt_password' => bcrypt($attributes['c_account_password'] . bin2hex(random_bytes(5))),
//            ]);
//
//            auth()->login($user);
//        }


        return redirect()->route('payment.index');
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
