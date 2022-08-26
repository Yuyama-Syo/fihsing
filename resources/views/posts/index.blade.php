<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Fishing information</title>
        <!-- Fonts -->
    </head>
    <body>
        {{Auth::user()->name}}
        <header>
            <h1>Fishing information</h1>
            <p>新しくアカウントを作る</p>
            <ul>
                <a>ホーム</a>
                <a>投稿する</a>
                <a>my page</a>
            </ul>
        </header>
        <div class="contents">
            //検索機能
            <form action="" method="GET">
                <input type="text" name="fish" value="">
                <select>
                    //configディレクトリでpref.phpに
                    //'1'=>'北海道のように都道府県
                    {!! Form::select('prefecture',App\Models\Prefecture::selectList(),old('prefecture'),['class' => 'form-control','id' => 'prefecture','placeholder' => '▼都道府県']) !!}
                    //市区町村のプルダウンメニュー
                    <select name="city" id="city" class="form-control">
                        <option value=""></option>
                    </select> 
                </select>
            </form>
            
            //投稿表示
            <div class="posts">
                @foreach($posts as $post)
                    <div class="post">
                        <ul>
                            <li>{{$post->created_at}}</li>
                            <li>{{$post->user_name}}</li>
                            <li>{{$post->good_number}}</li>
                        </ul>
                        <p>{{$post->target}}</p>
                        <p>{{$post->fishing_spot}}</p>
                        <p>{{$post->catch_number}}</p>
                        <img src="">
                    </div>
                @endforeach
            </div>
        </div>
        <script src="prefectures.js"></script>
    </body>
</html>
@endsection
