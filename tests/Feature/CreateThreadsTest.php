<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadsTest extends TestCase
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

    function test_guest_can_not_create_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
    	//hit end point to create new thread
    	$thread = factory('App\Thread')->make();

    	$this->post('/threads', $thread->toArray());
    	
    }

    function test_an_unatheticated_user_can_create_new_forum_threads()
    {

    	//signed in user
    	$this->actingAs(factory('App\User')->create());

    	//hit end point to create new thread
    	$thread = factory('App\Thread')->make();

    	$this->post('/threads', $thread->toArray());

    	//thread page
    	$this->get($thread->path())
    			//see the thread
 				 ->assertSee($thread->title)
    			->assertSee($thread->body);

    }
}
