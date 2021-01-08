<?php

namespace Database\Seeders;

use App\ThemeTeam;
use Illuminate\Database\Seeder;

class ThemeTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme_team = [
            [
                'id' => 1,
                'name' =>'Andrew Wills',
                'job_title' => 'Web Developer',
                'facebook_url' => '#',
                'linkedin_url' => '#',
                'insta_url' => '#',
                'twitter_url' => '#',
            ],
            [
                'id' => 2,
                'name' =>'Alisha Smith',
                'job_title' => 'Event Organizer',
                'facebook_url' => '#',
                'linkedin_url' => '#',
                'insta_url' => '#',
                'twitter_url' => '#',
            ],
            [
                'id' => 3,
                'name' =>'Robert White',
                'job_title' => 'Marketing Head',
                'facebook_url' => '#',
                'linkedin_url' => '#',
                'insta_url' => '#',
                'twitter_url' => '#',
            ],
        ];

        ThemeTeam::insert($theme_team);
    }
}
