<?php

namespace App\View\Components\Themes\Company;

use App\ThemeHeading;
use App\ThemeTestimonial;
use Illuminate\View\Component;

class HomeTestimonial extends Component
{
    public $heading_with_type_testimonial;
    public $testimonial_data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThemeHeading $heading_with_type_testimonial, ThemeTestimonial $testimonial_data)
    {
        $this->heading_with_type_testimonial   =   $heading_with_type_testimonial->where('type','testimonial')->first();
        $this->testimonial_data    =  $testimonial_data->isActive()->take(3)->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.themes.company.home-testimonial');
    }
}
