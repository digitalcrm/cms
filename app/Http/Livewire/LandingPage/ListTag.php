<?php

namespace App\Http\Livewire\LandingPage;

use App\Tag;
use Livewire\Component;

class ListTag extends Component
{
    public $perPage = 20;
    public $totalTags;

    public function render()
    {
        $article_by_tags = Tag::has('posts')->latest()->take($this->perPage)->get();

        return view('livewire.landing-page.list-tag',compact('article_by_tags'));
    }

    public function load()
    {
        $this->totalTags = Tag::get(['id']);

        $this->perPage += count($this->totalTags);
    }
}
