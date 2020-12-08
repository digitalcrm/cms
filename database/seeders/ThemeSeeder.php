<?php

namespace Database\Seeders;

use App\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'theme_name' => 'company_theme',
            ],
            [
                'theme_name' => 'blog_theme',
            ],
        ];

        Theme::insert($data);
    }

}
