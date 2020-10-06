<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingCustomer extends Model
{
    use SoftDeletes;

    protected $table = 'booking_customers';

    protected $primaryKey = 'id';

    protected $fillable = ['customer_name', 'email', 'mobile_number'];

    public function booking_events()
    {
        return $this->belongsToMany( BookingEvent::class );
    }
}
