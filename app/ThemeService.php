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

    public function isFaviconAvailable()
    {
        return $this->favicon 
                 ? '<i class="'.$this->favicon.'" aria-hidden="true"></i>'
                 : '';
                 
    }
}
