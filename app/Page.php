<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use App\Traits\DefaultProfile;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile, HasSlug;

    protected $table = 'pages';

    protected $fillable = [
    'title',
    'slug',
    'body',
    'image',
    'isActive',
    ];

    /**
     * Get the options for generating the slug.
    */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function imageUrl()
    {
        return $this->image
            ? Storage::disk($this->profilePhotoDisk())->url($this->image)
            : $this->defaultLogo();
    }

    public function scopeIsActive($query)
    {
        return $query->where('isActive', true);
    }

    public function updateProfilePhoto($photo)
    {
        if($photo){
            // dd($this->image);
            $this->deletepreviousImage($this->image);

            $image = $photo->storePublicly('page-image',$this->profilePhotoDisk());

            $this->update(['image' => $image]);
        }
    }
}
