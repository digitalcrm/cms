<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cookie extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cookies';
    
    protected $fillable = [
        'message_text',
        'button_text',
        'isActive',
        'isTerms',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('isActive',true);
    }
}
