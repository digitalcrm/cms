<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'social_links';

    protected $fillable = [
        'social_logo',
        'social_link',
        'isActive',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('isActive',true);
    }
}
