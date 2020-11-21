<?php

namespace App;

use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasSlug, HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'slug',
        'body',
        'published',
        'subcategory_id',
        'postcount',
        'isactive',
        'featured',
    ];

    protected $appends = [
        'featured_image',
    ];

    protected $table = 'posts';

    protected $with = ['user', 'category', 'subcategory', 'tags'];

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


    /**
     *  Anonymous Global Scopes
     *  https://laravel.com/docs/7.x/eloquent#query-scopes
     * @return void
     */

    // protected static function booted()
    // {
    //     static::addGlobalScope('isactive', function (Builder $builder) {
    //         $builder->where('isactive', 1);
    //     });
    // }

    /**
     * local scopes
     *
     * @param [type] $query
     * @return void
     */
    public function scopeActivePost($query, $filterby)
    {
        // return $query->where('isactive', 1);
        return $query->when($filterby == 'active', function ($query) {
            $query->has('user')->where('isactive', 1);
        });
    }

    public function scopeInactivePost($query, $filterby)
    {
        // return $query->where('isactive', 0);
        return $query->when($filterby == 'inactive', function ($query) {
            $query->has('user')->where('isactive', 0);
        });
    }

    public function scopeDraftPost($query, $filterby)
    {
        return $query->when($filterby == 'true', function ($query) {
            $query->has('user')->where('published', 0);
        });
    }

    public function scopeTrashPost($query, $filterby)
    {
        return $query->when($filterby == 'deleted', function ($query) {
            $query->has('user')->onlyTrashed();
        });
    }

    public function scopeWithRoleUserPost($query)
    {
        // return $query->whereHas('user', function($query) {
            $query->where('user_id', auth()->user()->id);
        // });
    }

    public function scopeCategoryFilter($query, $request)
    {
        $query->when($request, function($q){
            $q->whereHas('category', function($q1){
                $q1->where('name', request('category'));
            });
        });
    }

    public function scopeTagFilter($query, $request)
    {
        $query->when($request, function($q){
            $q->whereHas('tags', function($q1){
                $q1->where('name', request('tags'));
            });
        });
    }

    public function scopePopularFilter($query, $request)
    {
        // dd($request);
        $query->when($request === 'most_visited', function($q){
            $q->orderBy('postcount', 'desc');
            // dd('most-vist');
        });
    }

    public function scopeFeaturedFilter($query, $request)
    {
        // dd($request);
        $query->when($request === 'featured', function($q){
            $q->where('featured', true);
            // dd('most-vist');
        });
    }

    /*
    #  Old code without refactoring
    # Working Code index method code for fetch fecthing post
    # Here put for dummy purpose
        // if(auth()->user()->hasRole('superadmin|admin')) {

        //     $allPosts = $query->when(request('filterBy') == 'inactivepost', function($post) {
        //         $post->has('user')->Inactive();
        //     })->latest()->get();

        //     $allPosts = $query->when(request('filterBy') == 'activepost', function($post) {
        //         $post->has('user')->Isactive();
        //     })->latest()->get();

        //     $allPosts = $query->has('user')->latest()->get();

        // } else {
        //     $allPosts = $query->whereHas('user', function($query){
        //         $query->where('user_id',auth()->user()->id);
        //     })->latest()->get();
        // }
    */

    /** This posts_having_tags used for get the tags */
    public function getPostsHavingTagsAttribute()
    {
        $tags = $this->tags()->get()->map(function($tag) {
            return $tag->name;
        })->implode(',');

        if ($tags == '') return '';

        return $tags;
    }

    public function getSummaryOfBodyAttribute()
    {
        $body =  Str::limit(strip_tags($this->body), 156, '...');
        // dd($body);
        return $body;
    }

    /** get the default image api */
    public function getDefaultImageAttribute()
    {
        return 'https://via.placeholder.com/348x232?text='.$this->slug;
    }

    public function scopePopularPost($query)
    {
        return $query->orderBy('postcount', 'desc');
    }

    public function scopeFeaturedPost($query)
    {
        return $query->where('featured', true);
    }

    public function scopeActiveArticle($query)
    {
        return $query->where('isactive', true);
    }

    public function scopeSearch($query, $val)
    {
        $searchInput = '%'.$val.'%';
        return $query->where('title','like',$searchInput)
                    ->orWhere('body','like',$searchInput);
    }

}
