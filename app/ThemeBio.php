<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemeBio extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'theme_bios';

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image',
        'button_text1',
        'url1',
        'button_text2',
        'url2',
    ];

    public function imageUrl()
    {
        return $this->image
            ? Storage::disk($this->profilePhotoDisk())->url($this->image)
            : $this->defaultGravatar();
    }
}
