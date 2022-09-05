<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index'); 
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request('post');
        $post->fill($input)->save();
        return redirect('/post/'.$post->id);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function edit()
    {
        return view('posts/edit')->with(['post'=>$post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post=$request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/'.$post->id);
    }
}
