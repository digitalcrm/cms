<?php

namespace Database\Seeders;

use App\LandingpageStyle;
use Illuminate\Database\Seeder;

class LandingpageStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store_styles_id = [
            [
                'id' => 1,
            ],
        ];

        LandingpageStyle::insert($store_styles_id);
    }
}
