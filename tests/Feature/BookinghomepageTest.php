<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookinghomepageTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setup();

    }

    /** @test */
    public function client_side_check_list_of_services()
    {
        $services = $this->createService([], 2);

        $response = $this->get(route('bookings'));

        $response->assertStatus(200);

        $response->assertSee($services[0]->service_name);
        $response->assertSee($services[1]->service_name);
    }
}
