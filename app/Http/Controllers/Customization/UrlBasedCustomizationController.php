<?php

namespace App\Http\Controllers\Customization;

use App\Http\Controllers\Controller;
use App\ThemeSlider;
use Illuminate\Http\Request;

class UrlBasedCustomizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sliderupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'max:1024|mimes:png,jpg,jpeg',
            'heading' => 'required',
            'paragraph' => 'required',
            'button_text1' => 'required',
            'url1' => 'required',
            'button_text2' => 'required',
            'url2' => 'required',
        ]);

        $table_slider = ThemeSlider::findOrFail($id);
        
        if (request('image')) {
            $validatedData['image'] = $request->image->storePublicly('slider','public');
        }

        $table_slider->update($validatedData);

        return redirect()->back()->withTab('Slider '. $table_slider->id .' updated successfully');
    }

    public function serviceupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'max:1024|mimes:png,jpg,jpeg',
            'heading' => 'required',
            'paragraph' => 'required',
            'button_text1' => 'required',
            'url1' => 'required',
            'button_text2' => 'required',
            'url2' => 'required',
        ]);

        $table_slider = ThemeSlider::findOrFail($id);
        
        if (request('image')) {
            $validatedData['image'] = $request->image->storePublicly('slider','public');
        }

        $table_slider->update($validatedData);

        return redirect()->back()->withTab('Slider '. $table_slider->id .' updated successfully');
    }
}
