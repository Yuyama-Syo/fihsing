<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function mypage(User $user)
    {
        return view('User.mypage')->with(['own_posts'=>$user->getOwnPaginateByLimit()]);
    }
}
