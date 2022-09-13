<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $comment=new Comment();
        $comment->text=$request->comment;
        $comment->post_id=$request->post_id;
        $comment->user_id=$request->Auth::user()->id;
        $comment->save();
        
        return redirect('/posts/{post}');
    }
}
