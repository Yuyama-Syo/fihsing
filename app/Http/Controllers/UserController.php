<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function mypage(User $user)
    {
        $users=User::with('profiles')->take(5)->get();
    }
}
