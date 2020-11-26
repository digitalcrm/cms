<?php

namespace Database\Seeders;

use App\Logo;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logo_options = [
            [
                'options' => 'admin_panel_logo'
            ],
            [
                'options' => 'homepage__logo'
            ],
            [
                'options' => 'favicon'
            ],
        ];

        Logo::insert($logo_options);
    }
}
