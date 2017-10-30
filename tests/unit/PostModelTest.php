<?php

use App\Post;

class PostModelTest extends TestCase
{
    function test_adding_a_title_generates_a_slug()
    {
        $post = new Post([
            'title' => 'How build a house',
        ]);

        $this->assertSame('how-build-a-house', $post->slug);
    }

    function test_editing_the_title_changes_the_slug()
    {
        $post = new Post([
            'title' => 'How install Laravel',
        ]);

        $post->title='How build a castle';

        $this->assertSame('how-build-a-castle', $post->slug);
    }
}
