<?php

class ExampleTest extends FeatureTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    function test_basic_example()
    {
        $user = factory(App\User::class)->create([
            'name' => 'Daniel QH',
            'email' => 'daniel@email.com',
        ]);

        $this->actingAs($user, 'api');

        $this->visit('/api/user')->see('Daniel QH')->see('daniel@email.com');
    }
}
