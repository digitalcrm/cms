<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class UserStatus extends Component
{
    public $user;

    // public function mount($user) {

    //     $this->user = $user;
    // }

    public function updateStatus(User $user) {

    }

    public function render()
    {
        return view('livewire.user-status');
    }
}
