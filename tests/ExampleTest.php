<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    //With this trait we can run test without save data in our database
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(App\User::class)->create([
            'name' => 'Daniel QH',
            'email'=>'daniel@email.com',
        ]);

        $this->actingAs($user, 'api');

        $this->visit('/api/user')
            ->see('Daniel QH')
            ->see('daniel@email.com');
    }
}
