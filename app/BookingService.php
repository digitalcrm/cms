<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingService extends Model
{
    use SoftDeletes, HasFactory;
    /**
     * @var string
    */
    protected $table = 'booking_services';

    /**
     * @var string
    */
    protected $primaryKey = 'id';

    protected $appends = [
        'name',
    ];

    /**
     * @var array
    */
    protected $fillable = ['service_name'];

    public function bookingEvents() {

        return $this->hasMany( BookingEvent::class );

    }

    public function getNameAttribute() {

        return lcfirst($this->service_name);
     }
}
