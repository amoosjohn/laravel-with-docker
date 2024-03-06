<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_the_posts_list() {

        $response = $this->postJson('/api/posts');

        $response->assertStatus(200);
    }
}
