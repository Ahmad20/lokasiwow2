<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin/admin-home');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminBlog()
    {
        return view('admin/blog');
    }
    public function adminComment()
    {
        $comments = DB::table('comments')->orderByDesc('created_at')->get();
        return view('admin/comment', ['comments' => $comments]);
    }
    public function adminLocation()
    {
        return view('admin/location');
    }
    public function adminCategory()
    {
        return view('admin/category');
    }
    public function adminPost()
    {
        return view('admin/post');
    }
    public function adminUser()
    {
        return view('admin/user');
    }
}
