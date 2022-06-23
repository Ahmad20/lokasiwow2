<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

    function index(){
        return view('login');
    }

    function auth(Request $request){
        $credential = $request->validate([
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
        ]);
        if(Auth::attempt($credential)){
            //prevent session fixation
            $request->session()->regenerate();
            $request->session()->put("username", $credential['username']);
            return redirect()->intended('/');
            
            // return redirect()->intended("/");
        }
        // $request->session()->put("username", $credential['username']);
        return back()->with("failed", "Login Gagal");
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // $request->session()->flush();
        return redirect('/');
    }
}
