<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Fishing information</title>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <!-- Fonts -->
    </head>
    <body>
        <div class="container">
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
                
                <h2>自分の投稿</h2>
                <div class="posts">
                    @foreach($own_posts as $post)
                        <div class="post">
                            <h4>{{$post->target}}</h4>
                            <ul>
                                    <li>{{$post->prefecture_id}}　{{$post->city_id}}</li>
                                    <li>釣果：{{$post->catch_number}}匹</li>
                                    <li>釣行日：{{$post->catch_time}}</li>
                                    <li>釣果：{{$post->catch_number}}匹</li>
                                </ul>
                            <img src={{$post->image_path}}><br>
                            <a href="posts/{{$post->id}}">詳しく見る</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script src="prefectures.js"></script>
    </body>
</html>
@endsection