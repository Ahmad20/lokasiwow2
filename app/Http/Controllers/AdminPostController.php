<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(10);
        return view('admin.posts.index', ['posts'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'rating_score' => 'required|max:5|numeric',
            // 'image_link' => 'max:255',
            // 'rating_count' => 'numeric',
        ]);
            $data = [
                'title' => $request->title, 
                'location' => $request->location,
                'rating_score' => $request->rating_score,
                'image_link' => 'none',
                'rating_count' => 0 ,
            ];
            // dd($data);
            $post = Post::create($data);
            return redirect('/post')->with('success', "Wisata berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'rating_score' => 'required|max:5|numeric',
            // 'image_link' => 'max:255',
            // 'rating_count' => 'numeric',
        ]);
            $data = [
                'title' => $request->title, 
                'location' => $request->location,
                'rating_score' => $request->rating_score,
                'image_link' => $request->image_link,
                'rating_count' => $request->rating_count,
            ];
        post::find($id)->update($data);
        return redirect('/post')->with('success', "Info Wisata berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();
        return redirect('/post')->with('success', "Wisata berhasil dihapus");
    }
}
