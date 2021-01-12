<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $table = 'likes';

    protected $fillable = [
        'likeable_type',
        'likeable_id',
        'liked',
        'user_id',
    ];

    public function likeable()
    {
        return $this->morphTo();
    }
}
