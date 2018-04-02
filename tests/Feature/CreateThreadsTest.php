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

        $this->withExceptionHandling();
            
        $this->get('/threads/create')
            ->assertRedirect('/login');

        $this->post('/threads')
            ->assertRedirect('/login');
    }

    function test_an_autheticated_user_can_create_new_forum_threads()
    {

    	//signed in user
    	// $this->actingAs(create('App\User'));
        $this->signIn();

    	//hit end point to create new thread
    	$thread = create('App\Thread');

    	$this->post('/threads', $thread->toArray());

        // dd($thread->path());

    	//thread page
    	$this->get($thread->path())
    			//see the thread
 				 ->assertSee($thread->title)
    			->assertSee($thread->body);

    }
}
