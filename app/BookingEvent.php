<?php

namespace App;

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

    /**
     * @var array
    */
    protected $fillable = [
        'event_name',
        'user_id',
        'booking_service_id',
        'event_start',
        'event_end',
        'event_description',
    ];

    /**
     * Get the event based on the booking services.
     */
    public function booking_service()
    {
        return $this->belongsTo( BookingService::class );
    }
}
