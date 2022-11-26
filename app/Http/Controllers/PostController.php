<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
    * 特定IDのpostを表示する
    *
    * @params Object Post 
    * @return Reposnse post view
    */
    
    public function index(Post $post)
    {
        /*$post=Post::all();
        dd($post);*/
        
        $post = Post::withCount('likes')->get()->first();
        /*return view('posts/index')->with(['posts'=>$post]);*/
        return view('posts/index')->with(['posts'=>$post->getPaginateByLimit()]); 
    }
    
    public function store(Request $request, Post $post)
    {
        
        /*
        if($file=$request->image_path){
            $fileName=time().$file->getClientOriginalName();
            $target_path=public_path('storage/');
            $file->move($taregt_path,$fileName);
        }else{
            $fileName="";
        }
        
        */
        
        /*
        $post->user_id=Auth::user()->id;
        $post->target=$request->target;
        $post->catch_number=$request->catch_number;
        $post->size=$request->size;
        $post->prefecture_id=$request->prefecture_id;
        $post->city_id=$request->city_id;
        $post->weather=$request->weather;
        $post->catch_number=$request->catch_number;
        $post->fishing_type=$request->fishing_type;
        $post->rod=$request->rod;
        $post->reel=$request->reel;
        $post->line=$request->line;
        $post->item=$request->item;
        $post->comment=$request->comment;
        $post->image_path=$fileName;
        $post-
        
        Auth::user()->id
        
        $post->save(); */
        
        $input=$request['post'];
        $input_image=$input['image_path'];
        /*$interv=\Image::make($input_image)->encode('jpg');
        $fileName=time().$input['image_path']->getClientOriginalName();
        $target_path=public_path('storage/');
        $input['image_path']->move($target_path,$fileName);
        $fileName=Storage::disk('s3')->putFile('/',$input_image);
        $fileName=$input_image->storeAs('public',$input_image,['disk' => 's3', 'visibility' => 'public']);*/
        $fileName=Storage::disk('s3')->putFile('/',$input_image);
        $input['image_path']=Storage::disk('s3')->url($fileName);
        $post['user_id']=auth()->id();
        $post->fill($input)->save();
        
        return redirect('/');
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function post(Post $post)
    {
        $post = Post::withCount('likes')->where('id',$post->id)->get()->first();
        return view('posts/post')->with(['post' => $post]);
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
        return redirect('/');
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
