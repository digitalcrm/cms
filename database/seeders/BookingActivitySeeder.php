<?php

namespace Database\Seeders;

use App\BookingActivity;
use Illuminate\Database\Seeder;

class BookingActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultActivity = [
            [
                'title' => 'call',
                'created_at' => now(),
            ],
            [
                'title' => 'email',
                'created_at' => now(),
            ],
        ];

        BookingActivity::insert($defaultActivity);
    }
}
