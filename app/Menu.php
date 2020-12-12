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

    public function scopeIsActive($query)
    {
        return $query->where('isActive',true);
    }

    public function scopeHeaderMenu($query)
    {
        return $query->where('placed_in', 'header');
    }

    public function scopeFooterMenu($query)
    {
        return $query->where('placed_in', 'footer');
    }

    /** This filter is used for get the header or footer menu based on request */
    public function scopeTypeFilter($query, $filterby)
    {
        return $query->when($filterby == 'footer', function ($query) {
            $query->where('placed_in','footer');
        }, 
        function($query) use ($filterby) {
        return $query->when($filterby == '', function($query){
                $query->where('placed_in','header');
            });
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($menu) {
            $menu->slug = Str::slug($menu->name, '-');
        });
    }
}
