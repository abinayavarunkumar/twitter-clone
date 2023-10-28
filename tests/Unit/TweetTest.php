<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;

class TweetTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testUserCanCreateTweet()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/tweets', ['body' => 'This is a test tweet']);

        $this->assertDatabaseHas('tweets', ['body' => 'This is a test tweet']);

        $response->assertRedirect('/');

        // Add any other necessary assertions
    }
}
