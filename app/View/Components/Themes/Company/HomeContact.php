<?php

namespace App\View\Components\Themes\Company;

use App\SettingContact;
use Illuminate\View\Component;

class HomeContact extends Component
{
    public $first_contact_row;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SettingContact $first_contact_row)
    {
        $this->first_contact_row = $first_contact_row->isActive()->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-contact');
    }
}
