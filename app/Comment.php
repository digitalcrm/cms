<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=['body','user_id', 'parent_id', 'isActive','ip'];

    /**
     * Get the parent commentable model (post or other..).
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany( Comment::class, 'parent_id')->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsApproved($q)
    {
        return $q->where('isActive',true);
    }

    /** This filter is used for get the Comment or Reply based on request */
    public function scopeTypeFilter($query, $filterby)
    {
        return $query->when($filterby === 'replies', function ($query) {
            $query->whereNotNull('parent_id');
        }, 
        function($query) use ($filterby) {
        return $query->when($filterby === null, function($query){
                $query->whereNull('parent_id');
            });
        });
    }

    /** get the description with fixed length */
    public function comment_description()
    {
        $body =  Str::limit(strip_tags($this->body), 156, '...');
        return $body;
    }

    /** This below method is used for storing the ip addres when comment is created or updated */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($comment) {
            $comment->ip = request()->ip();
        });
    }

}
