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
            <ul>
                <a href="/">ホーム</a>
                <a href="/posts/create">投稿する</a>
                <a href="/user">my page</a>
            </ul>
        </header>
        <div class="contents">
            <!--
            <div class="profile">
                <a action="">フォロー</a>
                <a action="">フォロワー</a>
                <a action="">私の投稿</a>
                <a action="">いいねした投稿</a>
            </div>
            -->
            
            <h2>My posts</h2>
            <div class="posts">
                @foreach($own_posts as $post)
                    <div class="post">
                        <h4>{{$post->target}}</h4>
                        <p>{{$post->prefecture_id}}　{{$post->city_id}}</p>
                        <p>釣果：{{$post->catch_number}}匹</p>
                        <p>釣行日：{{$post->catch_time}}</p>
                        <p>釣果：{{$post->catch_number}}匹</p>
                        <img src="{{ asset('storage/'.$post->image_path) }}" width="180px" height="120px"><br>
                        <a href="posts/{{$post->id}}">詳しく見る</a>
                    </div>
                @endforeach
            </div>
        </div>
        <script src="prefectures.js"></script>
    </body>
</html>
@endsection