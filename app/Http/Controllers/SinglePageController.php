<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    function index(){
        return view('singlepage', [
            "name" => "Julius"
        ]);
    }

    function post(Request $request){
        return view('singlepage', [
            "name" => $request->browser,
        ]);
    }
}
