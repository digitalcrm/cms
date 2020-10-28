<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingEvent extends Model
{
    use SoftDeletes, HasFactory, HasSlug;
    /**
     * @var string
    */
    protected $table = 'booking_events';

    /**
     * @var string
    */
    protected $primaryKey = 'id';

    protected $with = ['bookingService','bookingcustomers'];

    protected $withCount = ['bookingcustomers'];

    /**
     * @var array
    */
    protected $fillable = [
        'event_name',
        'user_id',
        'booking_service_id',
        'booking_activity_id',
        'duration',
        'price',
        'event_start',
        'event_end',
        'event_description',
        'isActive',
    ];

    protected $appends = [
        'short_description',
    ];

    protected $dates = [
        'event_start',
        'event_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('event_name')
            ->saveSlugsTo('slug');
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    /**
     * Get the event based on the booking services.
     */
    public function bookingService()
    {
        return $this->belongsTo( BookingService::class );
    }

    public function bookingActivity()
    {
        return $this->belongsTo( BookingActivity::class );
    }

    public function getDurationAttribute($value)
    {
        return $value;
    }

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function getShortDescriptionAttribute()
    {
        return Str::limit($this->event_description, 56, '...');
    }

    public function bookingcustomers()
    {
        return $this->belongsToMany( BookingCustomer::class )->withTimestamps([
            'created_at',
            'booking_date',
            'updated_at'
        ]);
    }

    // public function startdate()
    // {
    //     return $this->event_start->format('d-m-y');
    // }

    // public function enddate()
    // {
    //     return $this->event_end->format('d-m-y');
    // }

    public function scopeActive($query)
    {
        return $query->where('isActive', 1);
    }

}
