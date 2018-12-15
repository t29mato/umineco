<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Spot;

class SpotTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAreasAndSpots()
    {
        $areas = Spot::getAreasAndSpots();
        $this->assertArrayHasKey(0, $areas);
        $this->assertArrayHasKey('id', $areas[0]);
        $this->assertArrayHasKey('spots', $areas[0]);
    }
}
