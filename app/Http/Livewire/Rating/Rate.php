<?php

namespace App\Http\Livewire\Rating;

use Livewire\Component;

class Rate extends Component
{
    public $post; // render post model

    public $rate; // rating input box

    // public function rateSubmit()
    // {
    //     $this->validate([
    //         'rate' => 'not_in:0|in:1,2,3,4,5'
    //     ]);

    //     $this->post->ratings()->updateOrCreate(
    //         [
    //             'rateable_id' => $this->post->id, 
    //             'user_id' => auth()->user()->id
    //         ],
    //         [
    //             'rating' => $this->rate,
    //             'user_id' => auth()->user()->id,
    //     ]);
    // }

    public function rate($rateValue)
    {
        $this->post->rateCreate($rateValue);
    }

    public function render()
    {
        return view('livewire.rating.rate');
    }
}
