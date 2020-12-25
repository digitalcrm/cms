<?php

namespace App\Http\Livewire\Media;

use App\Gallary;
use Livewire\Component;
use Livewire\WithPagination;

class GridMedia extends Component
{
    use WithPagination;

    public $gallaries;
    public $searchInput = '';

    public $file_name;
    public $file_path;
    public $mime_type;
    public $created_at;
    public $size;
    public $dimension;

    public $perPage = 15;

    protected $listeners = ['mediaLoad' => 'scrollMore'];

    public function scrollMore()
    {
        $this->perPage = $this->perPage + 6;
    }


    public function click_modal($id)
    {
        $row_media_data = Gallary::findOrFail($id);
        
        $this->file_name = $row_media_data->file_name;
        $this->file_path = $row_media_data->imageUrl();
        $this->mime_type = $row_media_data->mime_type;
        $this->created_at = $row_media_data->created_at->toFormattedDateString();
        $this->size = $row_media_data->total_size();
        $this->dimension = $row_media_data->image_widht_height();

    }
    public function render()
    {
        try {
            $this->gallaries = Gallary::search($this->searchInput)->latest()->take($this->perPage)->get();
            // $this->gallaries = Gallary::search($this->searchInput)->latest()->paginate($this->perPage);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('livewire.media.grid-media');
    }
}
