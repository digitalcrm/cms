<?php

namespace Database\Seeders;

use App\ThemeSlider;
use Illuminate\Database\Seeder;

class ThemeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowData = [
            [
                'id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'created_at' => now(),
            ],
        ];
        ThemeSlider::insert($rowData);
    }
}
