<?php

namespace App\Http\Livewire\LandingPage;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.landing-page.list-posts', [
            'list_of_posts' => Post::latest()->paginate(10),
        ]);
    }
}
