<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
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

    protected $thread;

    public function setUp()
    {

                parent::setUp();
                $this->thread = factory('App\Thread')->create();

    }

    function test_thread_can_make_string_path()
    {

        $thread = create('App\Thread');
        
        $this->assertEquals(
          
            "/threads/{$thread->channel->slug}/{$thread->id}", $thread->path()
        
        );
    
    }

    function test_has_replies()
    {

    	$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);

    }

    function test_thread_has_a_creator()
    {

        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    function test_thread_can_add_a_reply()
    {

        $this->thread->addReply([
           
            'body' => 'yolo',

            'user_id' => 1

        ]);

        $this->assertCount(1, $this->thread->replies);

    }

    function test_thread_belongs_to_a_channel()
    {

        $thread = create('App\Thread');

        $this->assertInstanceOf('App\Channel', $thread->channel);
    } 


}
