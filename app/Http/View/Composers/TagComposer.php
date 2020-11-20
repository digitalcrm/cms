<?php

namespace App\Http\View\Composers;

use App\Tag;
use Illuminate\View\View;

class TagComposer
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
        $view->with('blog_tags', Tag::has('posts')->latest()->take(15)->get());
    }
}
