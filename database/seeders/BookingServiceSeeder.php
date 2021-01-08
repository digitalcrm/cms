<?php

namespace Database\Seeders;

use App\BookingService;
use Illuminate\Database\Seeder;

class BookingServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BookingService::factory()->times(1)->create();
        BookingService::create([
            'service_name' => 'Appointment',
        ]);
    }
}
