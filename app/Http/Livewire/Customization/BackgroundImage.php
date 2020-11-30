<?php

namespace App\Http\Livewire\Customization;

use App\LandingpageStyle;
use Livewire\Component;
use Livewire\WithFileUploads;

class BackgroundImage extends Component
{
    use WithFileUploads;

    public $iteration; // This iteration is used for clear the file upload text
    public $background_image; // Table column name
    public $background_image_full_url; // Get full path of uploaded image url
    public $save = false; // This is used for hide/unhide button optional variable

    public $exception_message; // For getting the excepiton message if it is occur
    public $removeFlashMessage; // For removing the success message

    /** this function is used for real time validation message */
    public function updated()
    {
        $this->validate([
            'background_image' => 'image|max:1024|mimes:png,jpg,jpeg', // 1024 = 1MB Max
        ]);
    }

    /** If first row avaiable then show the value of its */
    public function mount()
    {
        try {
            $first_row_data = LandingpageStyle::first();

            $this->background_image_full_url = $first_row_data->profile_photo_url;

        } catch (\Throwable $th) {
            $this->exception_message = $th->getMessage();
        }
    }
    
    /** For updating the column */
    public function upload()
    {
        $this->validate([
            'background_image' => 'image|max:1024|mimes:png,jpg,jpeg', // 1024 = 1MB Max
        ]);
        
        // get the first row
        $landingpage_style_table_first_row_data = LandingpageStyle::first();

        // if image is selected
        if($this->background_image){
            $uploadedfile = $this->background_image->storePublicly('background_image','public');
        }
        
        // update the column
        $landingpage_style_table_first_row_data->update([
            'background_image' => $uploadedfile,
        ]);

        // set save true if image is uploaded
        $this->save = true;

        // This iteration is used for clear the file selected
        $this->iteration++;

        session()->flash('message', 'Background Image uploaded successfully');
    }

    public function render()
    {
        return view('livewire.customization.background-image');
    }
}
