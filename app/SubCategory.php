<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'category_id',
    ];

    protected $with = ['category'];

    public function category() {

        return $this->belongsTo( Category::class );
    }
}
