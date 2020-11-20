<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = ['name'];


    public function posts()
    {
        return $this->hasMany( Post::class );
    }

    public function subcategories() {

        return $this->hasMany(Subcategory::class);
    }

    public function category_has_total_posts()
    {
        return $this->hasMany( Post::class )->count();
    }

    public function category_name_with_total_posts()
    {
        return $this->name. ' ['.$this->category_has_total_posts().']';
    }
}
