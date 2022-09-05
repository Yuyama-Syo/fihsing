<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'target',
        'catch_number',
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
}
