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

    public function viewitem(Post $post)
    {
        $post->increment('postcount');

        return view('pages.landing-post-view-page',compact('post'));
    }

    public function latestpost()
    {
        return view('pages.landing-post-lists');
    }
}
