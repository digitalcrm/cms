<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutWidget extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'about_widgets';

    protected $fillable = [
        'heading',
        'sub_heading',
        'profile_path',
        'isActive',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('isActive', true);
    }
}
