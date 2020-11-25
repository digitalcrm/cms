<?php

namespace App\Http\Controllers;

use DB;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleLinkSendToFriend;

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

        $related_posts = $post->relatedPost()->orderBy('id', 'desc')->take(3)->get(['title','category_id','slug','body']);

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

    public function article_shares_to_friend(Request $request)
    {
        $validatedData = $request->validate([
            'post_sender_email' => ['required','email'],
            'post_receiver_email' => ['required','email'],
        ]);
        // dd($request->url());
        $getArticleURL = $request->currentPageURL;

        Mail::to($validatedData['post_receiver_email'])->send(new ArticleLinkSendToFriend($getArticleURL));

        return redirect()->back()->withMessage('Successfully Sent');
    }

    public function print_article($print_article)
    {
        $print_article = Post::where('slug',$print_article)->activeArticle()->get();

        return view('pages.printpost',compact('print_article'));
    }

    public function rss_feed()
    {
        $rss_latest_posts = Post::activeArticle()->latest()->take(20)->get();

        $sites = config('rss_config');

        // dd($sites['feeds']['main']['description']);

        $content = view('rss-feed', compact('rss_latest_posts','sites'));

        return response($content, 200)->header('Content-Type', 'text/xml');
    }

    public function favoritePost()
    {
        $post = Post::findOrFail(request('posts'));

        // dd($post->favorited());

        Auth::user()->favorites()->attach($post->id);

        return back();
    }

    public function unFavoritePost()
    {
        $post = Post::findOrFail(request('posts'));

        Auth::user()->favorites()->detach($post->id);

        return back();
    }
}
