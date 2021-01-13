<?php

namespace App\View\Components\Dashboard;

use App\Page;
use App\Post;
use App\User;
use Illuminate\View\Component;

class SmallBox extends Component
{
    public $totalPosts;
    public $totalPages;
    public $totalUsers;
    public $totalSubscribers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->totalPosts = Post::activeArticle()->count();
        $this->totalPages = Page::isActive()->count();
        $this->totalUsers = User::isActive()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.small-box');
    }
}
