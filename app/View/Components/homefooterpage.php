<?php

namespace App\View\Components;

use App\Category;
use App\Post;
use Illuminate\View\Component;

class homefooterpage extends Component
{
    // public $latest_posts;
    // public $latest_categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public function __construct(Post $latest_posts, Category $latest_categories)
    // {
    //     $this->latest_posts = $latest_posts->where('isactive',1)->latest()->take(5)->get();
    //     $this->latest_categories = $latest_categories->latest()->take(5)->get();
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.homefooterpage');
    }
}
