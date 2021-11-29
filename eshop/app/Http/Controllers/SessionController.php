<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        Cart::destroy();
        return redirect('/')->with('success', 'Dovidenia!');
    }

    public function store()
    {
        $attributes = request()->validate(([
            'email' => 'required|email',
            'password' => 'required',
        ]));

        if(auth()->attempt($attributes)){
            session()->regenerate();
            Cart::destroy();

            if(auth()->user()->email === 'lucia1234@gmail.com'){
                return redirect('/admin')->with('success', 'Serus!');
            }

            if (\Session::get('cart'.Auth::id())){
                $userCart =\Session::get('cart'.Auth::id());
                foreach($userCart as $item) {
                    Cart::add($item['id'],$item['name'],$item['quantity'],$item['price'],['pslug'=>$item['pslug'],'cslug'=>$item['cslug']])->associate('app\models\Product');
                }
            }
            return redirect('/')->with('success', 'Vitajte!');
        }

        throw ValidationException::withMessages([
           'email' => 'Nesprávny email',
           'password' => 'Nesprávne heslo',
        ]);
    }
}
