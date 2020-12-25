<?php

namespace App\Http\Livewire;

use App\Gallary;
use Livewire\Component;

class AddMedia extends Component
{
    public $gallaries;

    public $isClicked = false;
    public $image;
    public $fileName;
    public $mime_type;
    public $created_at;
    public $size;
    public $dimension;

    public $perPage = 10;

    protected $listeners = ['mediaLoad' => 'scrollMore'];

    public function scrollMore()
    {
        $this->perPage = $this->perPage + 6;
    }
    
    public function clickImage($id)
    {
        $this->isClicked = true;

        $gallary_data = Gallary::findOrFail($id);

        $this->image = $gallary_data->imageUrl();
        $this->fileName = $gallary_data->file_name;
        $this->mime_type = $gallary_data->mime_type;
        $this->created_at = $gallary_data->created_at->toFormattedDateString();
        $this->size = $gallary_data->total_size();
        $this->dimension = $gallary_data->image_widht_height();
    }

    public function resetall()
    {
        $this->isClicked = false;
        $this->reset();
    }

    public function render()
    {
        try {
            $this->gallaries = Gallary::latest()->take($this->perPage)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('livewire.add-media');
    }
}
