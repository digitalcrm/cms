<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThemeHeading extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'theme_headings';

    protected $fillable = [
        'type',
        'main_title',
        'sub_title',
    ];

    public const DropDown = [
        'client',
        'team',
        'testimonial',
    ];
}
