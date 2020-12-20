<?php

namespace App\Http\Livewire\Customization\Theme2;

use App\ThemeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogThemeVideo extends Component
{
    use WithFileUploads;

    public $slider_videos; //get raw data from table theme_sliders

    # table fields
    public $heading;
    public $image;
    public $paragraph;
    public $isActive;

    # other variable for handling the states
    public $wants_to_update;
    public $removeFlashMessage;
    public $rowId;
    public $not_found;
    public $iteration;

    public function store()
    {
        $validatedData = $this->validate([
            'image' => 'nullable|file|max:5024',
            'heading' => 'required',
            'paragraph' => 'required',
        ]);

        if ($this->image) {
            $validatedData['image'] = $this->image->storePublicly('video','public');
        }
        $validatedData['fileType'] = 'video';

        ThemeSlider::create($validatedData);

        session()->flash('message', 'Video Uploaded Successfully');

        $this->iteration++;

        $this->reset();

    }

    public function video_update($id)
    {
        $validatedData = $this->validate([
            'image' => 'nullable|file|max:5024',
            'heading' => 'required',
            'paragraph' => 'required',
        ]);

        $testimonial_row = ThemeSlider::findOrFail($id);

        if ($this->image) {
            $validatedData['image'] = $this->image->storePublicly('video','public');
        } else {
            unset($validatedData['image']);
        }

        $testimonial_row->update($validatedData);

        session()->flash('message', 'Data Updated successfully');

        $this->iteration++;

        $this->reset();
    }
    
    public function edit($id)
    {
        $this->wants_to_update = true;

        $row_data = ThemeSlider::findOrFail($id);

        $this->rowId = $row_data->id;
        $this->heading =  $row_data->heading;
        $this->paragraph =  $row_data->paragraph;

    }

    public function resetAll()
    {
        $this->reset();
    }

    public function status($id)
    {
        $data = ThemeSlider::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;

        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('message', 'Row '.$data->id.' Status Updated successfully');
    }

    // public function mount()
    // {
    //     try {
    //         $this->slider_videos = ThemeSlider::where('fileType','video')->get();
    //     } catch (\Throwable $th) {
    //         $this->not_found = $th->getMessage();
    //     }
    // }
    
    public function render()
    {
        try {
            $this->slider_videos = ThemeSlider::where('fileType','video')->get();
        } catch (\Throwable $th) {
            $this->not_found = $th->getMessage();
        }
        return view('livewire.customization.theme2.blog-theme-video');
    }
}
