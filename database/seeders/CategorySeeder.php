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
                'name' => 'Article',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 2,
                'name' => 'Software',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 3,
                'name' => 'Education',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 4,
                'name' => 'Health',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 5,
                'name' => 'Business',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categories);
    }
}
