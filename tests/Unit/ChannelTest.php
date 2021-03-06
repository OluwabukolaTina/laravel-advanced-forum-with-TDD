<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChannelTest extends TestCase
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

    public function test_a_channel_consists_of_threads()
    {

    	$channel = create('App\Channel');

    	$thread = create('App\Thread', ['channel_id' => $channel->id]);

    	$this->assertTrue($channel->threads->contains($thread));

    }

}
