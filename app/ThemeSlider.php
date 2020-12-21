<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemeSlider extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'theme_sliders';

    protected $fillable = [
        'fileType',
        'isActive',
        'image',
        'heading',
        'paragraph',
        'button_text1',
        'url1',
        'button_text2',
        'url2',
    ];

    public function imageUrl()
    {
        return $this->image
            ? Storage::disk($this->profilePhotoDisk())->url($this->image)
            : $this->defaultGravatar();
    }

    public function videoUrl()
    {
        return $this->image
            ? Storage::disk($this->profilePhotoDisk())->url($this->image)
            : asset('coverr.mp4');
    }

    public function scopeIsActive($query)
    {
        $query->where('isActive',true);
    }

    public function scopeIsVideo($query)
    {
        $query->where('fileType','video');
    }

    public function videoTag($height = null, $width = null, $additionalParameter = null)
    {
        $tag = '
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" height="'.$height.'" width="'.$width.'" '.$additionalParameter.'>
            <source src="'.$this->videoUrl().'" type="video/mp4">
        </video>
        ';
        return $tag;
    }
}
