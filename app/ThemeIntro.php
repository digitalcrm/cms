<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThemeIntro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'theme_intros';

    protected $fillable = [
        'description',
        'background_color',
        'font_color',
        'isActive',
    ];
}
