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

    public function averageRating()
    {
        // return $this->ratings()->where('rateable_id', $this->id)->selectRaw('SUM(rating)/COUNT(user_id) AS avg_rating')->first()->avg_rating;
        $avgRating = $this->ratings()->where('rateable_id', $this->id)->avg('rating');
        
        return ($avgRating == 0) ? 'None' : number_format($avgRating, 1);
    }

    public function totalRatingCount()
    {
        return $this->ratings()->where('rateable_id', $this->id)->sum('rating');
    }
}