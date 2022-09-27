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
                <a href="/">ホーム</a>
                <a href="/posts/create">投稿する</a>
                <a href="/user">my page</a>
            </ul>
        </header>
        <div class="contents">
           <img src="{{ asset('storage/'.$post->image_path) }}" width="450px" height="300px">
           <p>ターゲット：{{$post->target}}</p>
           <p>釣果数：{{$post->catch_number}}</p>
           <p>場所</p>
           <p id="prefectures">都道府県：{{$post->prefecture_id}}</p>
           <p id="city">市町村：{{$post->city_id}}</p>
           <p>天候：{{$post->weather}}</p>
           <p>日時：{{$post->catch_time}}</p>
           <p>タックル</p>
           <p>ロッド：{{$post->rod}}</p>
           <p>リール：{{$post->reel}}</p>
           <p>ライン：{{$post->line}}</p>
           <p>アイテム：{{$post->item}}</p>
           <p>コメント：{{$post->comment}}</p>
           <div id="map" style="height:500px; width:500px"></div>
           <button onclick="like({{$post->id}})">いいね</button><p>いいね数：{{$post->likes_count}}</p>
           <button onclick="unlike({{$post->id}})">いいね解除</button>
          
        </div>
        <div class="delete">
            @if (Auth::user()->id == $post->user_id)
            <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
            @endif
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script src="{{ asset('/js/good.js') }}"></script>
        <script src="{{ asset('/js/post_map.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAW_YZS20lxwovD3yvhil9ymMuU6sLVTU4&callback=initMap" async></script>
    </body>
</html>
@endsection