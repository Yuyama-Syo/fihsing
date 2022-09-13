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
    
    public function serch(PostRequest $request){
        $keyword_target=$request->target;
        $keyword_prefecture_id=$request->prefecture_id;
        $keyword_city_id=$request->city_id;
        
        if(!empty($keyword_target) && !empty($keyword_prefecture_id) && !empty($keyword_city_id)){
            $query=Post::query();
            $posts=$query->where('target','like','%'.$keyword_target.'%')->where('prefecture_id','like','%'.$keyword_prefecture_id)->where('city_id','like'.'%'.$keyword_city_id.'%')->get();
            return view('/serch')->with([
                'posts'=>$posts,
            ]);
        }
        
    }
}
