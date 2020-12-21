<?php

namespace App\View\Components\Themes\Theme2;

use App\ThemeSlider;
use Illuminate\View\Component;

class HeaderMiddle extends Component
{
    public $video_slides;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeSlider $themes)
    {
        try {
            $this->video_slides = $themes->isVideo()->firstOrFail();
        } catch (\Throwable $th) {
            $this->video_slides = false;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.theme2.header-middle');
    }
}
