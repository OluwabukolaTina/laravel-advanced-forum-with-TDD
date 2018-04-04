<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp ()
    {

        parent::setUp();

        //create a thread and assign it t the object
        $this->thread = factory('App\Thread')->create();

    }

    public function test_a_user_can_view_all_threads()
    {
        $this->get('/threads')

        ->assertSee($this->thread->title);

    }

    function test_user_can_read_a_single_thread()
    {
        // $thread = factory('App\Thread')->create();

         $this->get($this->thread->path())
                ->assertSee($this->thread->title);
    
    }

    function test_user_can_read_replies_associated_with_a_thread()
    {

        //there is a thread
        $reply = factory('App\Reply')
                ->create(['thread_id' => $this->thread->id]);

        //we should see the thread wehn we vidit that
        // $this->get('/threads/' . $this->thread->id)
                $this->get($this->thread->path())
            ->assertSee($reply->body);
    }

    function test_a_user_filter_thread_according_to_tag()
    
    {
            $channel = create('App\Channel');
        $threadInChannel = create('App\Thread', ['channel_id' => $channel->id]);
        $threadNotInChannel = create('App\Thread');
        $this->get('/threads/' . $channel->slug)
            ->assertSee($threadInChannel->title)
            ->assertDontSee($threadNotInChannel->title);
    }

    function test_a_user_can_filter_threads_by_any_username()
    {
     
        $this->signIn(create('App\User', ['name' => 'JohnDoe']));
     
        $threadByJohn = create('App\Thread', ['user_id' => auth()->id()]);
     
        $threadNotByJohn = create('App\Thread');
     
        $this->get('threads?by=JohnDoe')
     
            ->assertSee($threadByJohn->title)
     
            ->assertDontSee($threadNotByJohn->title);
    }

    // function test_user_can_filter_threads_by_popular()
    // {
        
    //     $threadWithTwoReplies = create('App\Thread');

    //     create('App\Reply', ['thread_id' => $threadWithTwoReplies->id], 2);

    //     $threadWithThreeReplies = create('App\Thread');

    //     create('App\Reply', ['thread_id' => $threadWithThreeReplies->id], 3);

    //     $threadWithNoReplies = $this->thread;

    //     $response = $this->getJson('threads?popular=1')->json();

    //     $this->assertEquals([3, 2, 0], array_column($response, 'replies_count'));


    // }

    function test_a_user_can_filter_by_popularity()
    {

        $threadWithTwoReplies = create('App\Thread');

        create('App\Reply', ['thread_id' => $threadWithTwoReplies->id], 2);

        $threadWithThreeReplies = create('App\Thread');

        create('App\Reply', ['thread_id' => $threadWithTwoReplies->id], 3);

        $threadWithNoReplies = $this->thread;

        $response = $this->getJson('/threads?popular=1')->json();

        // $response = assertSee($threadWithThreeReplies->title);
        $this->assertEquals([3, 2, 0], array_column($response, 'replies_count'));
    }


    




}
