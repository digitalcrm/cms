<?php

namespace App\View\Components;

use App\Theme;
use Illuminate\View\Component;

class CustomizationThemeSwitcher extends Component
{
    public $theme;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Theme $themes)
    {
        try {
            $getThemeId = $themes->isActive()->firstOrFail();
            $this->theme = $getThemeId->id;
        } catch (\Throwable $th) {
            $this->theme = 'First activate the theme please '.$th->getMessage();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.customization-theme-switcher');
    }
}
