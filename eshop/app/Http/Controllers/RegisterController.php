<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('registration', compact('categories'));
    }

    public function store()
    {
        $attributes = request()->validate(([
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
            'password_again' => 'required|min:7|max:255|same:password',
            'checkbox' => 'accepted',
        ]));

        $user = User::create([
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'salt_password' => $attributes['password'] . bin2hex(random_bytes(5)),
        ]);

        session()->flash('success','Váš účet bol úspešne vytvorený.');

        auth()->login($user);

        return redirect('/');

    }
}
