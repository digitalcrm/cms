<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Post;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class PostChart extends BaseChart
{
    public ?string $name = 'my_chart';

    public ?string $routeName = 'my_chart';
    
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
            $activePost = Post::activeArticle()->count();
            $inactivePost = Post::inactiveArticle()->count();
            $draftPost = Post::draftArticle()->count();
            $featuredPost = Post::featuredPost()->count();
        } else {
            $activePost = auth()->user()->posts()->activeArticle()->count();
            $inactivePost = auth()->user()->posts()->inactiveArticle()->count();
            $draftPost = auth()->user()->posts()->draftArticle()->count();
            $featuredPost = auth()->user()->posts()->featuredPost()->count();
        }

        return Chartisan::build()
            // ->labels(['Active', 'Inactive', 'Draft', 'Featured'])
            // ->dataset('',[$activePost,$inactivePost,$draftPost,$featuredPost]);
            ->dataset('Active', [$activePost])
            ->dataset('Inactive', [$inactivePost])
            ->dataset('Draft', [$draftPost])
            ->dataset('Featured', [$featuredPost]);
    }
}