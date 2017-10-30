<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
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
        $this->visit(route('posts.show', $post))
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);
    }
}
