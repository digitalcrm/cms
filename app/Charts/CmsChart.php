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
        foreach (auth()->user()->getRoleNames() as $role) {
            $roleName = $role;
        }
        if ($roleName === 'superadmin') {
            $posts = Post::activeArticle()->count();
        } else {
            $posts = auth()->user()->posts()->activeArticle()->count();
        }
        $pages = Page::isActive()->count();
        $categories = Category::count();
        $tags = Tag::count();

        return Chartisan::build()
            ->labels(['pages', 'posts', 'categories', 'tags'])
            ->dataset('sets', [$pages, $posts, $categories, $tags]);
    }
}
