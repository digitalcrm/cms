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

    public function description_of_intro_model()
    {
        return $this->description
                ? $this->description
                : 'No Description Found! For Changing this text Contact Administrator';
    }

    public function font_color_of_intro_model()
    {
        return $this->font_color ? $this->font_color.'!important' : '';
    }

    public function background_color_of_intro_model()
    {
        return $this->background_color ? $this->background_color.'!important' : '';
    }
}
