<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logo extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $fillable = [
        'options', 
        'alt_text', 
        'logo_path'
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function getProfilePhotoUrlAttribute()
    {
        return $this->logo_path
            ? Storage::disk($this->profilePhotoDisk())->url($this->logo_path)
            : '';
    }

    public function faviconURL()
    {
        return $this->logo_path
            ? Storage::disk($this->profilePhotoDisk())->url($this->logo_path)
            : '';
    }

    public function homepageLogoURL()
    {
        return $this->logo_path
            ? Storage::disk($this->profilePhotoDisk())->url($this->logo_path)
            : '';
    }

    public function adminPageLogoURL()
    {
        return $this->logo_path
            ? Storage::disk($this->profilePhotoDisk())->url($this->logo_path)
            : $this->defaultGravatar();
    }

    public function altText()
    {
        return $this->alt_text ?? config('app.name');
    }

}
