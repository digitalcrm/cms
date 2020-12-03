<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemeClient extends Model
{
    use HasFactory, SoftDeletes, DefaultProfile;

    protected $table = 'theme_clients';

    protected $fillable = [
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
