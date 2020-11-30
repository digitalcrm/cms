<?php

namespace App\Http\View\Composers;

use App\ArticleLimit;
use App\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // $getPaginationForCategory = ArticleLimit::first() ?? 5;
        $view->with('blog_categories', Category::latest()->take(5)->get());
    }
}
