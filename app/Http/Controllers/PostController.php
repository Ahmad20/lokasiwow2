<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // "/"
        $post = Post::all()->random(8);
        return response(['data'=>$post, 'message'=>'success']);
    }

    public function singlepage(Request $request, $post_id){
        // /posts/{post_id}
        $post = Post::findOrFail($post_id);
        return response($post);
    }

    // public function singlelocation(Request $request, $location){
    //     // /posts/{location}
    //     $post = Post::where('location', '=', $location)->get();
    //     return response($post);
    // }

    public function getBlog(){
        $post = Blog::all()->random(8);
        return response(['data'=>$post, 'message'=>'success']);
        // return response(Blog::all()->random(8));
    }
    public function getWisataJatim(){
        $post = Post::where('location', '=', 'aceh')->get();
        return response(['data'=>$post, 'message'=>'success']);
        // return response(Post::where('location', '=', 'aceh')->get());
    }
    public function getWisataNtb(){
        $post = Post::where('location', '=', 'ntb')->get();
        return response(['data'=>$post, 'message'=>'success']);
        // return response(Post::where('location', '=', 'ntb')->get());
    }
    public function getWisataJakarta(){
        $post = Post::where('location', '=', 'dki+jakarta')->get();
        return response(['data'=>$post, 'message'=>'success']);
        // return response(Post::where('location', '=', 'dki+jakarta')->get());
    }
    public function getCategoryPantai(){
        $post = Post::where('category', '=', 'pantai')->get();
        return response(['data'=>$post, 'message'=>'success']);
    }
    public function getCategoryGunung(){
        $post = Post::where('category', '=', 'gunung')->get();
        return response(['data'=>$post, 'message'=>'success']);
    }
    public function getCategorySeni(){
        $post = Post::where('category', '=', 'seni&budaya')->get();
        return response(['data'=>$post, 'message'=>'success']);
    }
    public function getCategoryReligi(){
        $post = Post::where('category', '=', 'religi')->get();
        return response(['data'=>$post, 'message'=>'success']);
    }
    public function save_comment(Request $request){
        $data=new Comment;
        $data->post_id=$request->post;
        $data->user_id=$request->user;
        $data->comment_text=$request->comment;
        $data->save();
        return response()->json([
            'bool'=>true
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
