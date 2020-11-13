<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'newsletters';

    protected $fillable = ['name', 'email', 'isSubscribed', 'token'];

    public function scopeGetSubscribers($query, $request)
    {
        return ($request === 'false') ? $query->where('isSubscribed', false) : $query->where('isSubscribed', true);
    }

    public function scopeIsSubscribed($query)
    {
        return $query->where('isSubscribed', true);
    }
}
