<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $blogs = Post::whereIsactive(1)->latest()->limit(3)->get();

        return view('welcome',compact('blogs'));
    }
}
