<?php

class CreatePostsTest extends FeatureTestCase
{
    function test_a_user_create_a_post()
    {
        // Having
        $title = 'This is a Question';
        $content = 'This is the content';

        $this->actingAs($user = $this->defaultUser());

        // When
        $this->visit(route('posts.create'))
            ->type($title, 'title')
            ->type($content, 'content')
            ->press('Submit');

        // Then
        $this->seeInDatabase('posts', [
            'title' => $title,
            'content' => $content,
            'pending' => true,
            'user_id' => $user->id,
        ]);

        // Test a user is redirected to the posts details after creating it.
        $this->see($title);
    }

    function test_creating_a_post_requires_authentication()
    {
        // When guest user visit this route
        $this->visit(route('posts.create'))->seePageIs(route('login'));
    }

    function test_create_post_form_validation()
    {
        $this->actingAS($user = $this->defaultUser())->visit(route('posts.create'))->press('Submit')->seePageIs(route('posts.create'))->SeeErrors([
                'title' => 'The title field is required',
                'content' => 'The content field is required',
            ]);
    }
}