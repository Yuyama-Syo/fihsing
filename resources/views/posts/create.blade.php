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
                <a>ホーム</a>
                <a>投稿する</a>
                <a>my page</a>
            </ul>
        </header>
        <div class="contents">
            <form action='' method="GET">
                ターゲット: <input type="text" name="target" placeholder="(カタカナで入力)"><br>
                釣果数: <input type="number" name="catch_number"><br>
                サイズ: <input type="text" name="size"><br>
                //都道府県の出力
                場所: <input type="" name="fishing_spot">
                天候: <input type="text" name="weather"><br>
                日時: <input type="date" name="catch_time">
                釣り方: <input type="text" name="fishing_type">
                タックル
                ・ロッド: <input type="text" name="rod">
                ・リール: <input type="text" name="reel">
                ・ライン: <input type="text" name="line">
                ・アイテム: <input type="text" name="item">
                コメント: <textarea name="comment"></textarea>
                画像: <input type="file" name="image">
                <input type="submit" value="投稿">
            </form>
        </div>
        <script src="prefectures.js"></script>
    </body>
</html>
@endsection