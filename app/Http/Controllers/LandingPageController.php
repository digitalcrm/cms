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

        // $related_posts = $post->has('category')->where('category_id', $post->category_id)->take(3)->get();
        $related_posts = $post->relatedPost()->take(3)->get(['title','category_id','slug','body']);
        // dd($related_posts);
        return view('pages.landing-post-view-page',compact('post','related_posts'));
    }

    public function latestpost()
    {
        return view('pages.landing-post-lists');
    }

    public function articles_by_category()
    {
        return view('pages.landing-list-of-category');
    }

    public function articles_by_tag()
    {
        return view('pages.landing-list-of-tag');

    }
}
