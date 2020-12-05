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

    public function scopeIsActive($query)
    {
        return $query->where('isActive', true);
    }

    public function socialFacebook()
    {
        return $this->facebook_url
        ? '<a href="'.$this->facebook_url.'"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>'
        : '';
    }
    public function socialLinkedIn()
    {
        return $this->linkedin_url
        ? '<a href="'.$this->linkedin_url.'"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>'
        : '';
    }
    public function socialInsta()
    {
        return $this->insta_url
        ? '<a href="'.$this->insta_url.'"><i class="fab fa-instagram" aria-hidden="true"></i></a>'
        : '';
    }
    public function socialTwitter()
    {
        return $this->twitter_url
        ? '<a href="'.$this->twitter_url.'"><i class="fab fa-twitter" aria-hidden="true"></i></a>'
        : '';
    }

}
