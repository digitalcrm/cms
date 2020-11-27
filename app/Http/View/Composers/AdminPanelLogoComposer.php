<?php

namespace App\Http\View\Composers;

use App\Logo;
use Illuminate\View\View;

class AdminPanelLogoComposer
{
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(
            'admin_logo', Logo::where('options','admin_panel_logo')->first(),
        );
    }
}
