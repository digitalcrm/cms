<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeService extends Model
{
    use HasFactory;

    protected $table = 'theme_services';

    protected $fillable = [
        'heading',
        'paragraph',
        'favicon',
    ];
}
