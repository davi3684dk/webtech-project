<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class RegisterController extends Controller
{
    public function show() {
        return view("register");
    }

    public function store(Request $request) {
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => request("name"),
            'email' => request("email"),
            'password' => request("password")
        ]);

        $credentials = $request->only("email", "password");
        Auth::attempt($credentials);

        return redirect()->route("index")->withSuccess('Signed in');
    }
}
