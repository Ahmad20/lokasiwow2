<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:users|min:3|max:255',
            'password' => 'required|min:3|max:255',
        ]);
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        $request->session()->put("username", $validated['username']);
        return redirect("/login")->with('success', 'Register Sukses Silakan Login');
    }   
}
