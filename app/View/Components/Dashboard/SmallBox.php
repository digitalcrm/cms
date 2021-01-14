<?php

namespace App\View\Components\Dashboard;

use App\Newsletter;
use App\Page;
use App\Post;
use App\User;
use Illuminate\View\Component;

class SmallBox extends Component
{
    /**posts */
    public $totalPosts;
    public $activePost;
    public $inactivePost;
    // public $draftPost;
    // public $featuredPost;
    public $totalUserPostViews;

    /** other */
    public $totalPages;
    public $totalUsers;
    public $totalSubscribers;

    public $roleName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($roleName)
    {
        if ($roleName === 'superadmin') {
            $this->totalPosts = Post::activeArticle()->count();
            $this->totalPages = Page::isActive()->count();
            $this->totalUsers = User::isActive()->count();
            $this->totalSubscribers = Newsletter::isSubscribed()->count();
        } else {
            $this->totalPosts = auth()->user()->posts()->count();
            $this->activePost = auth()->user()->posts()->activeArticle()->count();
            $this->inactivePost = auth()->user()->posts()->inactiveArticle()->count();
            $this->totalUserPostViews = auth()->user()->posts()->sum('postcount');
            // ray($this->totalUserPostViews);
            // $this->draftPost = auth()->user()->posts()->draftArticle()->count();
            // $this->featuredPost = auth()->user()->posts()->featuredPost()->count();
        }

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
