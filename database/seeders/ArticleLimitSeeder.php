<?php

namespace Database\Seeders;

use App\ArticleLimit;
use Illuminate\Database\Seeder;

class ArticleLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article_limit = [
            [
                'posts_limit' => 20,
                'category_limit' => 5,
            ]
        ];

        ArticleLimit::insert($article_limit);
    }
}
