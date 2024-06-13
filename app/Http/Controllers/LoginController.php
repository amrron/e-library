<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }
        // dd($request);

        return redirect('/asdfasdfsda');
    }
}
