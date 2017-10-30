<?php

use App\Post;

class ShowPostTest extends TestCase
{
    function test_a_user_can_see_the_post_details()
    {
        // Having
        $user = $this->defaultUser([
            'name' => 'Daniel',
        ]);

        $post = factory(Post::class)->make([
            'title' => 'This is the title from the post',
            'content' => 'This is the content from the post',
        ]);

        $user->posts()->save($post);

        // When
        $this->visit($post->url)->seeInElement('h1', $post->title)->see($post->content)->see($user->name);
    }

    function test_old_urls_are_redirected()
    {
        // Having
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'title' => 'Old title',
        ]);

        $user->posts()->save($post);

        $url = $post->url;

        $post->update(['title' => 'New title']);

        $this->visit($url)
             ->seePageIs($post->url);
    }
}
