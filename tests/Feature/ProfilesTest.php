<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfilesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }
    public function test_user_has_a_profile()
    {

    	$user = create('App\User');

    	$this->get("/profiles/{$user->name}")

    		->assertSee($user->name);

    }

    function test_profile_shows_all_thread_created_by_the_user()
    
    {
    	$user = create('App\User');

    	$thread = create('App\Thread', ['user_id' => $user->id]);

    	$this->get("/profiles/{$user->name}")
    		->assertSee($thread->title)
    		->assertSee($thread->body);
    }

}
