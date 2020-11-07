<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    public function bookingCustomers()
    {
        return $this->hasMany( 'App\BookingCustomer', 'booking_event_id' );
    }

    public function scopeActive($query)
    {
        return $query->where('isActive', 1);
    }

    public function scopeEndEvent($query)
    {
        return $query->where('event_end', '>=', now());
    }

    public function eventStatus()
    {
        $eventDate = $this->event_start;

        switch ($eventDate) {
            case $eventDate->toDateTimeString() < Carbon::now()->toDateTimeString():
                echo '<span class="badge badge-danger">completed</span>';
                break;

            case $eventDate->toDateTimeString() > Carbon::now()->toDateTimeString():
                echo '<span class="badge badge-primary">upcoming</span>';
                break;

            default:
                echo 'Event is started';
                break;
        }
    }

    public function scopeToday($query) {

        return $query->where('event_start', '=', now() );
    }

    public function scopeUpcoming($query) {

        return $query->where('event_end', '>', now()->toDateTimeString() );
    }

    public function scopeCompleted($query) {

        return $query->where('event_end', '<', now()->toDateTimeString() );
    }

}
