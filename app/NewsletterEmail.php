<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsletterEmail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'newsletter_emails';

    protected $fillable = ['subject', 'message'];
}
