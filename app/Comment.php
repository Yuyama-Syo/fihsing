<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'text',
        'user_id',
        'post_id'
    ];
    
    public function post(){
        return $this->belongsTo('App\Post');
    }
    
    public function $this->belongsTo('App\User');
}
