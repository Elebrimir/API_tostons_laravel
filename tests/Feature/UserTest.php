<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_all_users(): void
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }

    public function test_get_user(): void
    {
        $response = $this->get('/api/users/1');

        $response->assertStatus(200);
    }
}
