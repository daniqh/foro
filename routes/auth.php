<?php

// Routes that requieres Authentification

Route::get('posts/create', [
    'uses' => 'CreatePostController@create',
    'as' => 'posts.create',
]);

Route::post('post/create', [
    'uses' => 'CreatePostController@store',
    'as' => 'posts.store',
]);
