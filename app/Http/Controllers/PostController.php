<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts'=>$post->getPaginateByLimit()]); 
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request('post');
        $input+=['user_id'=>$request->user()->id];
        
        $dir='post_images';
        $file_name=$input->file('image_path')->getClientOriginalName();
        $input->file('image_path')->storeAs('public/'.$dir,$file_name);
        
        $input['image_path']=$file_name;
        
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
        $input_post+=['user_id'=>$request->user()->id];
        $post->fill($input_post)->save();
        
        return redirect('/posts/'.$post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('User.mypage');
    }
}
