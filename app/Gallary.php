<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallary extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'gallaries';

    protected $fillable = [
        'name',
        'file_name',
        'file_photo_url',
        'mime_type',
        'size',
    ];

    public function imageUrl()
    {
        return $this->file_photo_url
                ? Storage::disk($this->profilePhotoDisk())->url($this->file_photo_url)
                : '';
    }

    public function image_widht_height()
    {
        [$width, $height] = getimagesize($this->imageUrl());

        return $width.'x'.$height;
    }

    public function total_size()
    {
        $size_in_kb = ($this->size) / (1024);
        
        return $this->size 
                ? round($size_in_kb).' Kb'
                : '';
    }
}
