<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','category_id','title','slug','body'];

    protected $with = ['user'];

    public function category()
    {
        return $this->belongsTo( Category::class );
    }

    public function tags()
    {
        return $this->belongsToMany( Tag::class );
    }

    public function user() {
        return $this->belongsTo( User::class );
    }
}
