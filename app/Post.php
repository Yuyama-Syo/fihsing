<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable=[
        'user_id',
        'target',
        'catch_number',
        'max_size',
        'size',
        'prefecture_id',
        'city_id',
        'weather',
        'catch_time',
        'fishing_type',
        'rod',
        'reel',
        'line',
        'item',
        'comment',
        'image_path',
        ];
        
    public function getPaginateByLimit(int $limit_count=10)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
}
