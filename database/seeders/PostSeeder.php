<?php

namespace Database\Seeders;

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Post::factory()->for(User::factory())->count(5)->create();
        Post::factory()->count(20)->create();
    }
}
