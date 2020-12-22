<?php

namespace App\Http\Livewire\Media;

use App\Gallary;
use Livewire\Component;
use Livewire\WithFileUploads;

class GallaryUpload extends Component
{
    use WithFileUploads;

    public $photos = [];

    public $iteration;
    public $removeFlashMessage;

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

        redirect()->route('gallaries.index');
    }

    public function render()
    {
        return view('livewire.media.gallary-upload');
    }
}
