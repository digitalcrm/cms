<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingService extends Model
{
    use SoftDeletes;
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

    public function booking_events() {
        return $this->hasMany( BookingEvent::class );
    }

    public function getNameAttribute() {

        return lcfirst($this->service_name);
     }
}
