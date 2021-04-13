<?php

namespace Tests\Feature;

use Database\Seeders\FlatsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test correct api response
     *
     * @return void
     */
    public function test_api()
    {
        $seeder = new FlatsSeeder();
        $seeder->run();
        $response = $this->get('/api/flat');
        $response->assertJson(fn (AssertableJson $json) =>
        $json->has(9)
             ->first(fn ($json) =>
                $json->where('name', 'The Victoria')
                     ->where('price','374662.00')
                     ->etc()
             )
    );
    }
}
