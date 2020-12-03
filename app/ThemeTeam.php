<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemeTeam extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'theme_teams';

    protected $fillable = [
        'name',
        'job_title',
        'facebook_url',
        'linkedin_url',
        'insta_url',
        'twitter_url',
        'logo',
        'isActive',
    ];

    public function imageUrl()
    {
        return $this->logo
            ? Storage::disk($this->profilePhotoDisk())->url($this->logo)
            : $this->defaultGravatar();
    }

}
