<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_homepage_returns_successful_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_health_endpoint_returns_json()
    {
        $response = $this->get('/health');
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'OK',
        ]);
    }
}
