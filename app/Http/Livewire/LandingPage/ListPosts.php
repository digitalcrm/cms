<?php

namespace App\Http\Livewire\LandingPage;

use App\ArticleLimit;
use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pagniatePost;

    public function mount()
    {
        $this->pagniatePost = $this->takePostLimit();
    }

    public function takePostLimit()
    {
        $getPostPagination = ArticleLimit::first();

        return $getPostPagination->posts_limit ?? '15';
    }

    public function render()
    {
        // $lists_of_posts = Post::with(['category'])
        //     ->when(request('category_id'), function($query) {
        //         return $query->whereHas('category', function($q) {
        //             return $q->where('id', request('category'));
        //         });
        //     })
        //     ->orderBy('id', 'desc')
        //     ->paginate(3);
        $lists_of_posts = Post::categoryFilter(request('category'))
                                ->tagFilter(request('tags'))
                                ->popularFilter(request('blogs'))
                                ->featuredFilter(request('blogs'))
                                ->authorFilter(request('author'))
                                ->search(request('searchItem'))
                                ->orderBy('id', 'desc')->activeArticle()->paginate($this->pagniatePost);
        return view('livewire.landing-page.list-posts', [
            'list_of_posts' => $lists_of_posts,
        ]);
    }
}
