<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(20);
        return view('index', ['posts' => $post]);
        // return response([ 'posts' =>$post, 'message' => 'Success'], 200);
    }

    public function singlepage(Request $request, $post_id){
        $post = Post::findOrFail($post_id);
        $comments = DB::table('comments')
                            ->where('post_id', '=', $post_id)
                            ->orderByDesc('created_at')
                            ->get();
        return view('singlepage')->with('post', $post)->with('comments', $comments);
    }

    public function singlelocation(Request $request, $location){
        // $post = Post::findOrFail($location);
        // $post = DB::table('posts')
        //                     ->where('location', '=', $location)
        //                     ->get();
        $post = Post::where('location', '=', $location)->paginate(20);
        // return dd($post);
        return view('index', ['posts' => $post]);
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
