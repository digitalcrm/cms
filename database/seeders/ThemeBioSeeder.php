<?php

namespace Database\Seeders;

use App\ThemeBio;
use Illuminate\Database\Seeder;

class ThemeBioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme_whoweare = [
            [
                'id' => 1,
                'title' => 'Who We Are',
                'sub_title' => 'Services we serve to all over the world',
                'description' => 'Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.',
                'button_text1' => 'Get Started',
                'url1' => '#getstarted',
                'button_text2' => 'Free Trial',
                'url2' => '#freetrial',
            ],
        ];

        ThemeBio::insert($theme_whoweare);
    }
}
