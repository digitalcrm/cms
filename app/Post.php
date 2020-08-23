<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = ['user_id','category_id','title','slug','body','subcategory_id'];

    protected $appends = [
        'featured_image',
    ];

    protected $table = 'posts';

    protected $with = ['user'];

    public function category()
    {
        return $this->belongsTo( Category::class );
    }

    public function subcategory()
    {
        return $this->belongsTo( Subcategory::class );
    }

    public function tags()
    {
        return $this->belongsToMany( Tag::class );
    }

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function getFeaturedImageAttribute() {

       return $this->getMedia('posts')->last();
    }

    // public function media()
    // {
    //     return $this->morphMany(Media::class, 'model');
    // }

    public function registerMediaCollections(): void
    {
    $this
        ->addMediaCollection('posts')
        ->useDisk('media')
        ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('post-thumb')
                ->width(35)
                ->height(35);
        });
    }
}
