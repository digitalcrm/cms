<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'menus';

    protected $fillable = [
        'name',
        'slug',
        'page_id',
        'placed_in',
        'sort_order',
        'isActive',
    ];

    /** This const variable is used for dropdown put value in header or footer */
    public const PLACED_IN = [
        'header',
        'footer',
    ];

    /** Menu belong to page and page can have many menus */
    public function page()
    {
        return $this->belongsTo( Page::class );
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($menu) {
            $menu->slug = Str::slug($menu->name, '-');
        });
    }
}
