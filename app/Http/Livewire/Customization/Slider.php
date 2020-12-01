<?php

namespace App\Http\Livewire\Customization;

use App\ThemeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class Slider extends Component
{
    use WithFileUploads;

    public $heading;
    public $paragraph;
    public $button_text1;
    public $url1;
    public $button_text2;
    public $url2;
    public $image;

    public $table_data;

    public $image_full_path_url;

    public $removeFlashMessage;
    public $not_found;
    public $iteration;

    public function updated()
    {
        $this->validate([
            'image' => 'required|max:1024|mimes:png,jpg,jpeg',
            'heading' => 'required',
            'paragraph' => 'required',
            'button_text1' => 'required',
            'url1' => 'required',
            'button_text2' => 'required',
            'url2' => 'required',
        ]);
    }
    // public function create()
    // {
    //     $validatedData = $this->validate([
    //         'image' => 'required|max:1024|mimes:png,jpg,jpeg',
    //     ]);

    //     ThemeSlider::create($validatedData);

    //     session()->flash('message', 'Image Uploaded Successfully');

    //     $this->reset();
    // }

    public function updateSlider($id)
    {
        $validatedData = $this->validate([
            'image' => 'required|max:1024|mimes:png,jpg,jpeg',
            'heading' => 'required',
            'paragraph' => 'required',
            'button_text1' => 'required',
            'url1' => 'required',
            'button_text2' => 'required',
            'url2' => 'required',
        ]);

        $find_data = ThemeSlider::find($id);

        // dd($find_data->id);
        if($this->image){
            $validatedData['image'] = $this->image->storePublicly('slider','public');
        }

        $find_data->update($validatedData);

        $this->iteration++;

        session()->flash('message', 'Data Updated Successfully');
    }

    public function mount()
    {
        try {
            $this->table_data = ThemeSlider::all();
            foreach ($this->table_data as $data) {
                $this->heading = $data->heading;
                $this->paragraph = $data->paragraph;
                $this->button_text1 = $data->button_text1;
                $this->url1 = $data->url1;
                $this->button_text2 = $data->button_text2;
                $this->url2 = $data->url2;
            }
            // $this->image_full_path_url = $table_data
        } catch (\Throwable $th) {
            $this->not_found = $th->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.customization.slider');
    }
}
