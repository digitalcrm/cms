<?php

namespace Database\Seeders;

use App\BookingEvent;
use App\BookingService;
use Illuminate\Database\Seeder;

class BookingEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        * for is used when we have belongsTo relationship
        * if we have hasMany or other then use the has instead of for
        */
        BookingEvent::factory()->for(BookingService::factory())->count(3)->create();
    }
}
