<?php

namespace Database\Seeders;

use App\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social_links = [
            [
                'id' => 1,
                'social_logo' => 'fab fa-twitter',
                'social_link' => '#twitter',
            ],
            [
                'id' => 2,
                'social_logo' => 'fab fa-facebook',
                'social_link' => '#facebook',
            ],
            [
                'id' => 3,
                'social_logo' => 'fab fa-linkedin',
                'social_link' => '#linkedin',
            ],
            [
                'id' => 4,
                'social_logo' => 'fab fa-instagram-square',
                'social_link' => '#Instagram',
            ],
        ];

        SocialLink::insert($social_links);
    }
}
