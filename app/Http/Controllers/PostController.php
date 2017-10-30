<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function show(Post $post, $slug)
    {
        if ($post->slug != $slug) {
            //301 permanent redirection
            return redirect($post->url,301);
        }

        return view('posts.show', compact('post'));
    }
}
