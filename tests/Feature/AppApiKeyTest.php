<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppApiKeyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_fail_without_api_key(): void
    {
        $response = $this->postJson('/api/v1/posts');

        $response->assertStatus(403);
    }

    public function test_fail_with_wrong_api_key(): void
    {
        $response = $this->postJson('/api/v1/posts',[],[
            'app_api_key' => '9PbkAPjEHgCtXmSbQMoHQooNfVdFUGen332FoZQ9V6M7XiVfU7q9xvsuY'
        ]);

        $response->assertStatus(403);
    }

    public function test_success_with_correct_api_key(): void
    {
        $response = $this->postJson('/api/v1/posts',[],[
            'app_api_key' => '9PbkAPjEHgCtXmSbQMoHQooNfVdFUGen332FoZQ9V6M7XiVfU7q9xvsuYjor'
        ]);

        $response->assertStatus(200);
    }
}
