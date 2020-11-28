<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingCmsVisibility extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cms_visibilities';

    protected $fillable = [
        'visibility_name',
        'action',
    ];

    public static function get_first_row_of_visibility($columnVisibilityName)
    {
        $post_date_value = SettingCmsVisibility::where('visibility_name', $columnVisibilityName)->first();

        return $post_date_value->action;
    }
}
