<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;

class TweetTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use DatabaseTransactions;
     public function test_can_view_home(): void
     {

        $user = User::factory()->create();
        $response = $this
        ->actingAs($user)
        ->get('/home');

        $response->assertOk();
     }

    public function testUserCanCreateTweet(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/tweets', ['body' => 'This is a test tweet']);
        $this->assertDatabaseHas('tweets', ['body' => 'This is a test tweet']);
       // $response->assertRedirect('/');
        // Add any other necessary assertions
    }
}
