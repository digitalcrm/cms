<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandingpageStyle extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'landingpage_styles';

    protected $fillable = [
        'body_background_color',
        'nav_head_color',
        'firstfootercolor',
        'secondfootercolor',
        'a_tag_color',
        'a_tag_hover_color',
        'primary_color',
        'secondary_color',
        'h2_tag_color',
        'background_image',
        'backgroundstatus',
    ];
}
