<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function destory()
    {
        auth()->logout();

        return redirect('/')->with('success', 'You are now logged out');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);

        if(auth()->attempt($attributes))
        {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);

        //return back()
        //->withInput()
        //->withErrors([
        //    'message' => 'Please check your credentials and try again'
        //]);
    }
}
