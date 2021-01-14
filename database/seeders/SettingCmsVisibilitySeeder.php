<?php

namespace Database\Seeders;

use App\SettingCmsVisibility;
use Illuminate\Database\Seeder;

class SettingCmsVisibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultValue = [
            [
                'visibility_name' => 'tool_posted_date',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_category',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_user',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_saved',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_views',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_share',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_print',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_search_box',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_popular_posts',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_featured_posts',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_latest_posts',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_related_posts',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_category_lists',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_tag_clouds',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_comments',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_likes',
                'created_at' => now(),
            ],
            [
                'visibility_name' => 'tool_ratings',
                'created_at' => now(),
            ],
        ];

        SettingCmsVisibility::insert($defaultValue);
    }
}
