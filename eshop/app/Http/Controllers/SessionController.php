<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

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
            return redirect('/')->with('success', 'Vitajte!');
        }

        throw ValidationException::withMessages([
           'email' => 'Nesprávny email',
           'password' => 'Nesprávne heslo',
        ]);
    }
}
