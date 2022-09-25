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
            <div class="profile">
                <p>{{$user->name}}</p>
                
                //それぞれのactionを記述
                <a action="">フォロー</a>
                <a action="">フォロワー</a>
                <a action="">私の投稿</a>
                <a action="">いいねした投稿</a>
            </div>
            //投稿表示
            <h2>My posts</h2>
            <div class="posts">
                //自分の投稿のみ表示するように変更が必要
                @foreach($own_posts as $post)
                    <div class="post">
                        <ul>
                            <li>{{$post->created_at}}</li>
                            <li>{{$post->user_name}}</li>
                            <li>{{$post->good_number}}</li>
                        </ul>
                        <p>{{$post->target}}</p>
                        <p>{{$post->prefecture_id}}　{{$post->city_id}}</p>
                        <p>{{$post->catch_number}}</p>
                        <img src="{{asset($post->image_path)}}">//投稿画像のリンク
                    </div>
                @endforeach
            </div>
            <div class="paginate">
                {{$post->links()}}
            </div>
        </div>
        <script src="prefectures.js"></script>
    </body>
</html>
@endsection