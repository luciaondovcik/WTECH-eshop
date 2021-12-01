<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\ShippingCompanyDetails;
use App\Models\ShippingDetails;
use App\Models\User;
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
//        dd($request->c_create_account);
        $shipping = new ShippingDetails;
        if (Auth::check()){
            $shipping->user_id = Auth::id(); ///Neviem lognut userid
        }
        else{
            $shipping->user_id = -1;
        }
        $shipping->name = $request->c_fname;
        $shipping->surname = $request->c_lname;
        $shipping->phone_number = $request->c_phone;
        $shipping->address = $request->c_address;
        $shipping->zip_code = $request->c_postal_zip;
        $shipping->city = $request->c_state_city;
        $shipping->country = $request->c_state_country;

        $shipping->save();

        if($request->c_diff_fname != ""){
            $shipping_c = new ShippingCompanyDetails;
            $shipping_c->name = $request->c_diff_fname;
            $shipping_c->surname = $request->c_diff_lname;
            $shipping_c->company_name= $request->c_diff_companyname;
            $shipping_c->email = $request->c_diff_email_address;
            $shipping_c->phone_number = $request->c_diff_phone;
            $shipping_c->address = $request->c_diff_address;
            $shipping_c->zip_code = $request->c_diff_postal_zip;
            $shipping_c->city = $request->c_diff_state_city;
            $shipping_c->country = $request->c_diff_state_country;
            $shipping_c->save();
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
