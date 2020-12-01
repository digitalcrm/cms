<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandingpageStyle extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'landingpage_styles';

    protected $fillable = [
        'body_background_color',
        'nav_head_color',
        'firstfootercolor',
        'secondfootercolor',
        'a_tag_color',
        'a_tag_hover_color',
        'primary_color',
        'secondary_color',
        'h2_tag_color',
        'background_image',
        'backgroundstatus',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function getProfilePhotoUrlAttribute()
    {
        return $this->background_image
            ? Storage::disk($this->profilePhotoDisk())->url($this->background_image)
            : $this->defaultGravatar();
    }
}
