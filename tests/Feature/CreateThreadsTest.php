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
    	$thread = make('App\Thread');

    	$response = $this->post('/threads', $thread->toArray());

        // dd($response->headers->get('location'));

    	//thread page
    	$this->get($response->headers->get('location'))
    			//see the thread
 				 ->assertSee($thread->title)
    			->assertSee($thread->body);

    }

    function test_requires_a_title()
    {

        $this->publishThread(['title' => null])
                ->assertSessionHasErrors('title');
    
    }

    function test_requires_a_body()
    {

        $this->publishThread(['body' => null])
                ->assertSessionHasErrors('body');
    
    }

    function test_requires_a_valid_channel()
    {

        factory('App\Channel', 2)->create();

        $this->publishThread(['channel_id' => null])
                ->assertSessionHasErrors('channel_id');

        $this->publishThread(['channel_id' => 999])
                ->assertSessionHasErrors('channel_id');
    
    }

    public function publishThread($overrides = [])
    {


        $this->withExceptionHandling()
            ->signIn();

        $thread = make('App\Thread', $overrides);

        return $this->post('/threads', $thread->toArray());
    }
}
