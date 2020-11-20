<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [

        'name',
    ];

    public function posts() {

        return $this->belongsToMany(Post::class);

    }

    public function tag_has_total_posts()
    {
        return $this->belongsToMany( Post::class )->count();
    }

    public function tag_name_with_total_posts()
    {
        return $this->name. ' ['.$this->tag_has_total_posts().']';
    }

}
