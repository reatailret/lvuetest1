<?php

namespace Tests\Feature;

use App\Models\Flat;
use Database\Seeders\FlatsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FlatseederTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Flat seeder test
     *
     * @return void
     */
    public function test_seeding()
    {
        $seeder = new FlatsSeeder();
        $seeder->run();
        $this->assertEquals(Flat::all()->count(),9);
    }
}
