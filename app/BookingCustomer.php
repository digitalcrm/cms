<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class BookingCustomer extends Model
{
    use SoftDeletes;

    protected $table = 'booking_customers';

    protected $primaryKey = 'id';

    protected $fillable = ['customer_name', 'email', 'mobile_number'];

    protected $appends = [
        'booking_time',
    ];

    protected $dates = ['booking_time'];


    public function bookingevents()
    {
        return $this->belongsToMany( BookingEvent::class );
    }

    public function getBookingTimeAttribute()
    {
        return Carbon::parse($this->pivot->booking_date)->toDayDateTimeString();
    }

}
