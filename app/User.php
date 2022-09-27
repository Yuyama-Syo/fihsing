<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','self_introduction',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     *
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $primaryKey = 'id';
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    public function getOwnPaginateByLimit(int $limit_count=10)
    {
        return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
}
