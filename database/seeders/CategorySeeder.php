<?php

namespace Database\Seeders;

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id'  => 1,
                'name' => 'Framework',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 2,
                'name' => 'Language',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 3,
                'name' => 'Library',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 4,
                'name' => 'Blog',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 5,
                'name' => 'CMS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categories);
    }
}
