<?php

namespace App\Http\Livewire;

use App\Gallary;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddMedia extends Component
{
    use WithFileUploads;

    public $gallaries;
    
    public $photos = [];
    public $iteration;
    public $removeFlashMessage;

    public $isClicked = false;
    public $image;
    public $fileName;
    public $mime_type;
    public $created_at;
    public $size;
    public $dimension;

    public $perPage = 10;

    protected $listeners = [
        'mediaLoad' => 'scrollMore',
        'uploadImage' => 'save',
    ];


    public function updatedPhotos()
    {
        $this->validate([
            'photos.*' => 'required|image|max:1024', // 1MB Max
        ]);
    }

    public function save()
    {
        $this->validate([
            'photos.*' => 'required|image|max:1024', // 1MB Max
        ]);

        if ($this->photos) {
            foreach ($this->photos as $photo) {
                // $file_extension = $photo->extension();
                $path_url = $photo->storePublicly('gallary','public');
    
                Gallary::create([
                    'name' =>$photo->getClientOriginalName(),
                    'file_name' => $photo->getClientOriginalName(),
                    'file_photo_url' => $path_url,
                    'mime_type' => $photo->getMimeType(),
                    'size' => $photo->getSize(),
                ]);
            }
        }
        session()->flash('message', 'File Uploaded Successfully');

        $this->iteration++;

        $this->reset();

    }

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
