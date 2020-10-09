<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingEvent extends Model
{
    use SoftDeletes;
    /**
     * @var string
    */
    protected $table = 'booking_events';

    /**
     * @var string
    */
    protected $primaryKey = 'id';

    protected $with = ['booking_service','bookingcustomers'];

    protected $withCount = ['bookingcustomers'];

    /**
     * @var array
    */
    protected $fillable = [
        'event_name',
        'user_id',
        'booking_service_id',
        'duration',
        'price',
        'event_start',
        'event_end',
        'event_description',
    ];

    protected $appends = [
        'short_description',
    ];

    /**
     * Get the event based on the booking services.
     */
    public function booking_service()
    {
        return $this->belongsTo( BookingService::class );
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

}
