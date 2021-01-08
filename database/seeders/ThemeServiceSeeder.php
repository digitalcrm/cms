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
                'heading' => 'Theme Services',
                'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu ornare ante. Proin aliquam odio id lorem finibus, a ullamcorper arcu posuere.',
                'favicon' => null,
            ],
            [
                'id' => 2,
                'heading' => 'Real Estate',
                'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu ornare ante. Proin aliquam odio id lorem finibus, a ullamcorper arcu posuere.',
                'favicon' => 'fa fa-life-ring rounded-icon',
            ],
            [
                'id' => 3,
                'heading' => 'Tech & Startups',
                'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu ornare ante. Proin aliquam odio id lorem finibus, a ullamcorper arcu posuere.',
                'favicon' => 'fa fa-rocket rounded-icon',
            ],
            [
                'id' => 4,
                'heading' => 'Pharmaceutical',
                'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu ornare ante. Proin aliquam odio id lorem finibus, a ullamcorper arcu posuere.',
                'favicon' => 'fa fa-life-ring rounded-icon',
            ],
        ];

        ThemeService::insert($row_data);
    }
}
