<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'booking_activities';

    protected $fillable = ['title'];

    public function bookingEvents()
    {
        return $this->hasMany( BookingEvent::class );
    }

    public function scopeSearch($query, $val)
    {
        return $query->where('title','like','%'.$val.'%');
    }
}
