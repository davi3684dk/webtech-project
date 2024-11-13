<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function show() {
        return view("login");
    }
    //

    public function store(Request $request) {
        $email = request("email");
        $password = request("password");

        $valdiator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            redirect()->intended("index")->withSuccess('Signed in');
        }

        $valdiator['emailPassword'] = 'Email or Password is incorrect';
    
        return redirect()->route("login")->withErrors($valdiator);
    }

    public function logout(Request $request) {
        if (auth()->check()) {
            Auth::logout();
        }
 
        return redirect('/');
    }
}
