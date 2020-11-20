<?php

namespace App\Http\Livewire\LandingPage;

use App\Category;
use Livewire\Component;

class ListCategory extends Component
{
    public $perPage = 3;
    public $totalPost;

    public function render()
    {
        $article_by_category = Category::has('posts')->latest()->take($this->perPage)->get();

        return view('livewire.landing-page.list-category',compact('article_by_category'));
    }

    public function load()
    {
        $this->totalPost = Category::get(['id']);

        $this->perPage += count($this->totalPost);
    }
}
