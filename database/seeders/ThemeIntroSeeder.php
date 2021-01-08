<?php

namespace Database\Seeders;

use App\ThemeIntro;
use Illuminate\Database\Seeder;

class ThemeIntroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_theme_intro = [
            [
                'id' => 1,
                'description' => 'Aynsoft Classic has been the Largest Global Software Company for more than 18 years, making it the most trusted corporation in the world.',
                'background_color' => '#00a8ff',
                'font_color' => '#F5FBFF',
            ],
        ];

        ThemeIntro::insert($company_theme_intro);
    }
}
