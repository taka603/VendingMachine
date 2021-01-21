<?php

namespace App\Http\Controllers;

use Facades\App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        //email,passwordデータを取得
        $credentials = $request->only(['email', 'password']);
        
        if(Auth::attempt($credentials)){
            //認証に成功
            return redirect()->route('index');
        }
        //認証されていない状態は403を返す
        abort(403);
    }

    public function register(Request $request){
        //リクエストからemail,passwordを取得しインスタンス生成
        User::register($request->get('email'), $request->get('password'));

        return redirect()->route('index');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('index');
    }
}
