<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class PostIntegrationTest extends TestCase
{
    use DatabaseTransactions;

    public function test_a_slug_is_generated_and_saved_to_the_database()
    {
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'title' => 'How build a house',
        ]);

        $user->posts()->save($post);

        $this->assertSame('how-build-a-house', $post->fresh()->slug);
    }
}
