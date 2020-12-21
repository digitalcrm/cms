<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'themes';

    protected $fillable = ['theme_name', 'theme_image', 'isActive'];

    protected $append = ['name'];

    public function imageUrl()
    {
        return $this->theme_image
            ? Storage::disk($this->profilePhotoDisk())->url($this->theme_image)
            : $this->defaultImage($this->theme_name);
    }

    public function getNameAttribute()
    {
        return strtoupper($this->theme_name);
    }

    public function scopeIsActive($query)
    {
        return $query->where('isActive', true);
    }

    public function image_Screenshots($id)
    {
        switch ($id) {
            case '1':
                return asset('screenshots/company_theme.png');
                break;

            case '2':
                return asset('screenshots/blog_theme.png');
                break;
            
            default:
                # code...
                break;
        }
    }
}
