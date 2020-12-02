<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThemeStatistic extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'theme_statistics';

    protected $fillable = [
        'main_text',
        'sub_text',
        'isActive',
    ];
}
