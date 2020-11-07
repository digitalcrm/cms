<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingShare extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sender_name',
        'sender_email',
        'receiver_name',
        'receiver_email',
        'booking_event_id',
        'url',
        'message',
    ];

    protected $table = 'booking_shares';

    protected $primaryKey = 'id';

    protected $dates = [
        'deleted_at',
    ];
}
