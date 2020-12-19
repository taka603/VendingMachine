<?php

namespace App\Http\Controllers;

use Facades\App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
        
        if(Auth::attempt($credentials)){
            return redirect()->route('index');
        }

        abort(403);
    }

    public function register(Request $request){
        User::register($request->get('email'), $request->get('password'));

        return redirect()->route('index');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('index');
    }
}
