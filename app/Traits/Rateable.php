<?php

namespace App\Traits;

use App\Rating;
use Illuminate\Support\Facades\Auth;

trait Rateable 
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function user_rated()
    {
        return (bool) Rating::where('user_id', Auth::id())
                            ->where('rateable_id', $this->id)
                            ->first();
    }
}