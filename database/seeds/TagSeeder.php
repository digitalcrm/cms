<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'id'  => 1,
                'name' => 'laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 2,
                'name' => 'php',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 3,
                'name' => 'VueJs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 4,
                'name' => 'my-first-blog',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'  => 5,
                'name' => 'Wordpress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Tag::insert($tags);
    }
}
