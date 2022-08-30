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
           <p>{{$post->user_id}}</p>
           //imgのurlを入れる
           <img src="">
           <p>ターゲット：{{$post->target}}</p>
           <p>釣果数：{{$post->catch_number}}</p>
           <p>場所</p>
           <p>都道府県：{{$post->prefecture_id}}</p>
           <p>市町村：{{$post->city_id}}</p>
           <p>天候：{{$post->weather}}</p>
           <p>日時：{{$post->catch_time}}</p>
           <p>タックル</p>
           <p>ロッド：{{$post->rod}}</p>
           <p>リール：{{$post->reel}}</p>
           <p>ライン：{{$post->line}}</p>
           <p>アイテム：{{$post->item}}</p>
           <p>コメント：{{$post->comment}}</p>
           
           //この下にチャット欄
           
        </div>
        <script src="prefectures.js"></script>
    </body>
</html>
@endsection