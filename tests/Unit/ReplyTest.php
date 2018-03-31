<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
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

    public function test_it_has_an_owner()
    {
    	$reply = factory('App\Reply')->create();

    	$this->assertInstanceOf('App\User', $reply->owner);
    }
}
