<?php

namespace App\Traits;

use App\Like;
use Illuminate\Support\Facades\Auth;

trait Likeable 
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function liked()
    {
        return (bool) Like::where('user_id', Auth::id())
                            ->where('likeable_id', $this->id)
                            ->where('liked', true)
                            ->first();
    }

    public function totalLikes()
    {
        return $this->likes()->where('liked',true)->count();
    }
}