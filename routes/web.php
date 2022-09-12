<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','PostController@index');
Route::get('/posts','PostController@store');
Route::get('/posts/create','PostController@create');
Route::get('/posts/{post}','PostController@post');
//いいねした投稿を表示
Route::get('/posts/{post}/edit','PostController@edit');
Route::put('/posts/{post}','PostController@update');
Route::get('/user','UserController@mypage');
Route::delete('posts/{post}','PostController@delete');
Auth::routes();
Route::group(['middleware'=>['auth']],function(){
    Route::get('/posts','PostController@store');
});

