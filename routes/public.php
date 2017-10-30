<?php

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Lanza el error

Route::get('posts/{post}', [
    'as' => 'posts.show',
    'uses' => 'PostController@show',
])->where('post','[0-9]');
