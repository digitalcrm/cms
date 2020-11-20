<?php

namespace App\Http\View\Composers;

use App\Post;
use Illuminate\View\View;

class PostComposer
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
        $view->with(
            'blog_posts', Post::activeArticle()->latest()->take(5)->get(),
        );
        $view->with(
            'popular_posts', Post::activeArticle()->popularPost()->take(5)->get(),
        );
    }
}
