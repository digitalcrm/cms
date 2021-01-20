<?php

namespace App\Traits;

use App\User;
use App\Rating;
use InvalidArgumentException;
use Illuminate\Support\Facades\Auth;

trait Rateable
{
    /**
     * Rating store
     * @param int $rating
     * @param User|null $user
     */
    public function rateCreate($rating, $user = null)
    {
        if ($rating > 5 || $rating < 1) {
            throw new InvalidArgumentException('Ratings must be between 1-5.');
        }

        $this->ratings()->updateOrCreate(
            [
                'user_id' => auth()->user()->id
            ],
            compact('rating') // This one is simple either use can use below one
            // [
            //             'rating' => $rating,
            //             'user_id' => auth()->user()->id,
            // ]
        );
    }

    /**
     * User rated boolean true/false
     *
     */
    public function user_rated()
    {
        return (bool) Rating::where('user_id', Auth::id())
            ->where('rateable_id', $this->id)
            ->first();
    }

    /**
     * Get average rating of Model
     *
     */
    public function averageRating()
    {
        // return $this->ratings()->where('rateable_id', $this->id)->selectRaw('SUM(rating)/COUNT(user_id) AS avg_rating')->first()->avg_rating;
        $avgRating = $this->ratings()->where('rateable_id', $this->id)->avg('rating');

        return ($avgRating == 0) ? 'None' : number_format($avgRating, 1);
    }

    /**
     * Sum the value of rating column
     *
     */
    public function totalRatingCount()
    {
        return $this->ratings()->where('rateable_id', $this->id)->sum('rating');
    }

    /**
     * get how much user rated the model
     *
     * @param User $user
     */
    public function ratingFor(User $user)
    {
        return $this->ratings()->where('user_id', $user->id)->where('rateable_id', $this->id)->value('rating');
    }

    /**
     * count the rating for Model
     */
    public function ratesCount()
    {
        return $this->ratings()->where('rateable_id', $this->id)->count();
    }

    /**
     * Relationship instance
     *
     */
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }
}
