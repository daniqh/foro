<?php

use App\User;

class ExampleTest extends FeatureTestCase
{
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
