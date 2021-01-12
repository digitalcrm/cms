<?php

namespace App\Http\Livewire\Likeable;

use Livewire\Component;

class Like extends Component
{
    public $post;

    public function likeStore()
    {
        $this->post->likes()->updateOrCreate(
            [
                'likeable_id' => $this->post->id, 
                'user_id' => auth()->user()->id
            ],
            [
            'liked' => true,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function dislikeStore()
    {
        $this->post->likes()->updateOrCreate(
            [
                'likeable_id' => $this->post->id, 
                'user_id' => auth()->user()->id
            ],
            [
            'liked' => false,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function render()
    {
        return view('livewire.likeable.like');
    }
}
