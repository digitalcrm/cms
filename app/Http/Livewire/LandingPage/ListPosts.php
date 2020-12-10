<?php

namespace App\Http\Livewire\LandingPage;

use App\Post;
use App\Theme;
use App\ArticleLimit;
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

    /* commented code for render
     $lists_of_posts = Post::with(['category'])
            ->when(request('category_id'), function($query) {
                return $query->whereHas('category', function($q) {
                    return $q->where('id', request('category'));
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(3);
     */
   
}
