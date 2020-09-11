<?php

namespace App\View\Components\userprofile;

use Illuminate\View\Component;

class profileInfo extends Component
{
    public $profileinfo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($profileinfo)
    {
        $this->profileinfo = $profileinfo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.userprofile.profile-info');
    }
}
