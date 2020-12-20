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

    public function scopeIsActive($query)
    {
        $query->where('isActive',true);
    }
}
