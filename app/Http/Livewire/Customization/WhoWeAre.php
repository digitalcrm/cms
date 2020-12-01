<?php

namespace App\Http\Livewire\Customization;

use App\ThemeBio;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class WhoWeAre extends Component
{
    use WithFileUploads;

    public $title;
    public $sub_title;
    public $description;
    public $image;
    public $button_text1;
    public $url1;
    public $button_text2;
    public $url2;

    public $image_full_path_url;

    public $not_found;
    public $save = false;
    public $iteration;

    public $removeFlashMessage;

    public function updated()
    {
        $this->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'image' => 'max:1024|mimes:png,jpg,jpeg',
            'button_text1' => 'required',
            'url1' => 'required',
            'button_text2' => 'required',
            'url2' => 'required',
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'image' => 'required|max:1024|mimes:png,jpg,jpeg',
            'button_text1' => 'required',
            'url1' => 'required',
            'button_text2' => 'required',
            'url2' => 'required',
        ]);

        if($this->image){
            $validatedData['image'] = $this->image->storePublicly('who_we_are','public');
        }

        ThemeBio::create($validatedData);

        session()->flash('message', 'First Row Data Created Successfully');

        $this->save = true;
    }

    public function update(Request $request)
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'image' => 'max:1024|mimes:png,jpg,jpeg',
            'button_text1' => 'required',
            'url1' => 'required',
            'button_text2' => 'required',
            'url2' => 'required',
        ]);

        $first_row = ThemeBio::first();

        if($this->image){
            $validatedData['image'] = $this->image->storePublicly('who_we_are','public');
        }

        $first_row->update($validatedData);

        $this->iteration++;

        session()->flash('message', 'Data Updated Successfully');

    }

    public function mount()
    {
        try {
            $table_data = ThemeBio::first();

            $this->title = $table_data->title;
            $this->sub_title = $table_data->sub_title;
            $this->description = $table_data->description;
            // $this->image = $table_data->image;
            $this->button_text1 = $table_data->button_text1;
            $this->url1 = $table_data->url1;
            $this->button_text2 = $table_data->button_text2;
            $this->url2 = $table_data->url2;

            $this->image_full_path_url = $table_data->imageUrl();

            $this->save = true;
        } catch (\Throwable $th) {
            $this->not_found = $th->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.customization.who-we-are');
    }
}
