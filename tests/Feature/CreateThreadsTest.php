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
    	$thread = make('App\Thread');

    	$this->post('/threads', $thread->toArray());
    	
    }

    function test_guest_can_not_see_create_threads_page()
    {

        $this->withExceptionHandling()
            ->get('/threads/create')
            ->assertRedirect('/login');
    }

    function test_an_unatheticated_user_can_create_new_forum_threads()
    {

    	//signed in user
    	$this->actingAs(create('App\User'));

    	//hit end point to create new thread
    	$thread = make('App\Thread');

    	$this->post('/threads', $thread->toArray());

    	//thread page
    	$this->get($thread->path())
    			//see the thread
 				 ->assertSee($thread->title)
    			->assertSee($thread->body);

    }
}
