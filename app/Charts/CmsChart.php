<?php

declare(strict_types=1);

namespace App\Charts;

use App\Tag;
use App\Page;
use App\Post;
use App\Category;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;

class CmsChart extends BaseChart
{
    public ?string $name = 'cms_chart';

    public ?string $routeName = 'cms_chart';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $pages = Page::isActive()->count();
        $categories = Category::count();
        $posts = Post::activeArticle()->count();
        $tags = Tag::count();

        ray($pages, $categories, $posts, $tags);
        return Chartisan::build()
            ->labels(['pages', 'posts', 'categories', 'tags'])
            ->dataset('sets', [$pages, $categories, $posts, $tags]);
    }
}
