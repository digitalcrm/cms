<?php

namespace App\Http\Livewire\LandingPage;

use App\ArticleLimit;
use App\Category;
use Livewire\Component;

class ListCategory extends Component
{
    public $catLimit;
    public $totalPost;

    public function mount()
    {
        $this->catLimit = $this->takeCategroyLimit();
    }

    public function render()
    {
        $article_by_category = Category::has('posts')->latest()->take($this->catLimit)->get();

        return view('livewire.landing-page.list-category',compact('article_by_category'));
    }

    public function takeCategroyLimit()
    {
        $getCategoryPagination = ArticleLimit::first();

        return $getCategoryPagination->category_limit ?? '15';
    }

    public function load()
    {
        $this->totalPost = Category::get(['id']);

        $this->catLimit += count($this->totalPost);
    }
}
