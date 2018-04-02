<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInThreadsTest extends TestCase
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

    function test_unauthenticated_users_can_not_add_replies()
    {
    	//expect an exception
    	$this->withExceptionHandling()
            ->post('/threads/some-channel/1/replies', [])
            ->assertRedirect('/login');

    }

    function test_auth_user_can_participate_in_threads()

    {
    
    	// $this->be($user = factory('App\User')->create());
        $this->signIn();

    	//add a thread
    	$thread = create('App\Thread');

    	//reply
        $reply = make('App\Reply');

        // dd($thread->path().'/replies');

    	$this->post($thread->path().'/replies', $reply->toArray());

    	//replies should be vsisble
    	$this->get($thread->path())
    		->assertSee($reply->body);


    }

    function test_a_reply_requires_a_body()
    {

        $this->withExceptionHandling()
            ->signIn();

        $thread = create('App\Thread');

        //reply
        $reply = make('App\Reply', ['body' => null]);


        $this->post($thread->path().'/replies', $reply->toArray())
                ->assertSessionHasErrors('body');

    }
}
