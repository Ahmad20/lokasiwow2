<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function index(){
        return view('profile');
    }
    public function update(Request $request){
        if($request['new-username']){
            DB::table('users')->where('username',$request['old-username'])->update([
                'username' => $request['new-username']
            ]);
            $request->session()->put("username",  $request['new-username']);
            return redirect()->intended("/");
        }
        return redirect()->back();
        
    }
    public function delete(Request $request){
        DB::table('users')->where('username',$request['old-username'])->delete();
        $request->session()->flush();
        return redirect()->intended("/");
    }
}
