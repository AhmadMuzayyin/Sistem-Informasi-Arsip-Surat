<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function auth(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credentials)){
            session()->regenerate();
            return redirect('/dashboard')->with('success', 'Selemat datang '.Auth()->user()->fullname);
        }
        return redirect()->back()->with('error', 'login error, silahkan cek username dan password anda.');
    }
    public function logout(){
        Auth::logout();
        return to_route('login');
    }
}
