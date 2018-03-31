<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{

	use RefreshDatabase;
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
    	$this->expectException('Illuminate\Auth\AuthenticationException');

    	$this->post('/threads/1/replies', []);

    }

    function test_auth_user_can_participate_in_threads()

    {
    
    	$this->be($user = factory('App\User')->create());

    	//add a thread
    	$thread = factory('App\Thread')->create();

    	//reply
    	$reply = factory('App\Reply')->make();

    	$this->post($thread->path().'/replies', $reply->toArray());

    	//replies should be vsisble
    	$this->get($thread->path())
    		->assertSee($reply->body);


    }
}
