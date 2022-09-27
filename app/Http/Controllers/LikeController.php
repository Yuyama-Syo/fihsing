<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($postId)
    {
        Auth::user()->like($postId);
        return 'ok!'; 
    }

    public function destroy($postId)
    {
        Auth::user()->unlike($postId);
        return 'ok!'; 
    }
}
