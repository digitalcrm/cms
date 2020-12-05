<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemeTestimonial extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'theme_testimonials';

    protected $fillable = [
        'name',
        'quote',
        'profile_url',
        'isActive',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('isActive', true);
    }
    public function imageUrl()
    {
        return $this->profile_url
            ? Storage::disk($this->profilePhotoDisk())->url($this->profile_url)
            : $this->defaultGravatar();
    }
}
