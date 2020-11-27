<?php

namespace App\Http\View\Composers;

use App\Logo;
use Illuminate\View\View;

class HomePageLogoComposer
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
            'homepage_logo', Logo::where('options','homepage__logo')->first(),
        );
    }
}
