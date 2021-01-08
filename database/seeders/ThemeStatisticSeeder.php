<?php

namespace Database\Seeders;

use App\ThemeStatistic;
use Illuminate\Database\Seeder;

class ThemeStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme_stats = [
            [
                'id' => 1,
                'main_text' => '450',
                'sub_text' => '	pre-built websites1',
            ],
            [
                'id' => 2,
                'main_text' => '451',
                'sub_text' => '	pre-built websites1',
            ],
            [
                'id' => 3,
                'main_text' => '452',
                'sub_text' => '	pre-built websites1',
            ],
            [
                'id' => 4,
                'main_text' => '453',
                'sub_text' => '	pre-built websites1',
            ],
        ];
        
        ThemeStatistic::insert($theme_stats);
    }
}
