<?php

namespace App\Http\Livewire\Rating;

use Livewire\Component;

class Rate extends Component
{
    public $rate; // rating input box
    public $review;

    public $post; // post model automatically render because we render it through post show

    public function rateSubmit()
    {
        $this->validate([
            'rate' => 'not_in:0|in:1,2,3,4,5'
        ]);

        $this->post->ratings()->updateOrCreate(
            [
                'rateable_id' => $this->post->id, 
                'user_id' => auth()->user()->id
            ],
            [
                'rating' => $this->rate,
                'user_id' => auth()->user()->id,
        ]);

        $this->reset('rate');
    }

    public function mount()
    {
        $this->review = $this->post->ratings()->count();
    }

    public function render()
    {
        return view('livewire.rating.rate');
    }
}
