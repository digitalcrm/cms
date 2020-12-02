<?php

namespace Database\Seeders;

use App\ThemeService;
use Illuminate\Database\Seeder;

class ThemeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row_data = [
            [
                'id' => 1,
            ],
            [
                'id' => 2,
            ],
            [
                'id' => 3,
            ],
            [
                'id' => 4,
            ],
        ];

        ThemeService::insert($row_data);
    }
}
