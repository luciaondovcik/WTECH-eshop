<?php

namespace App\Http\Controllers;

use App\Models\TempCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
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
            Cart::destroy();
            $last = DB::table('temp_carts')->where('user_id', '=', Auth::id())->get()->last();
            if($last){
                $cart = unserialize($last->content);
                foreach($cart as $item) {
                    Cart::add($item[0],$item[1],$item[2],$item[3],['pslug'=>$item[4],'cslug'=>$item[5],'image'=>$item[6]])->associate('app\models\Product');
                }
            }

            if(auth()->user()->email === 'lucia1234@gmail.com'){
                return redirect('/admin')->with('success', 'Serus!');
            }


            return redirect('/')->with('success', 'Vitajte!');
        }

        throw ValidationException::withMessages([
           'email' => 'Nesprávny email',
           'password' => 'Nesprávne heslo',
        ]);
    }
}
