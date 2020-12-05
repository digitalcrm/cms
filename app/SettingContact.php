<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'setting_contacts';

    protected $fillable = [
        'title',
        'paragraph',
        'address',
        'isActive',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('isActive', true);
    }
}
