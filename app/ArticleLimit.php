<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleLimit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'article_limits';

    protected $fillable = ['posts_limit', 'category_limit'];
}
