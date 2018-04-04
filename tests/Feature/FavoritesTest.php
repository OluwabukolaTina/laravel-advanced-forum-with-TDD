<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavoritesTest extends TestCase
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

    function test_guests_can_not_favorite_anything()
    {
        $this->withExceptionHandling()

            ->post('replies/1/favorites')

                ->assertRedirect('/login');

}

    public function test_an_auth_user_can_like_any_reply()
    {
        $this->signIn();

    	$reply = create('App\Reply');

    	$this->post('replies/' . $reply->id . '/favorites');

        // dd(\App\Favorite::all());

    	//see in the db
    	$this->assertCount(1, $reply->favorites);
    
    }

    function test_an_auth_user_can_favorite_a_reply_only_once()
    {

        $this->signIn();

        $reply = create('App\Reply');

        try {

        $this->post('replies/' . $reply->id . '/favorites');

        $this->post('replies/' . $reply->id . '/favorites');

        } catch ( \Exception $e) {

                $this->fail('did not except to unsert the same record twice');
            
            }

        //see in the db
        $this->assertCount(1, $reply->favorites);

    }


}
