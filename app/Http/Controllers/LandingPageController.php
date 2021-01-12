<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Post;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleLinkSendToFriend;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LandingPageController extends Controller
{
    // protected $get_active_theme_id;
    protected $themeId;

    public function __construct(Theme $themes)
    {
        try {
            // $this->get_active_theme_id = $themes->isActive()->firstOrFail();
            $theme_id_get = $themes->isActive()->firstOrFail();
            $this->themeId = $theme_id_get->id;
        } catch (ModelNotFoundException $e) {
            return view('errors.not-found-exception');
        }
    }

    public function index()
    {
        // dd($this->themes);
        $blogs = Post::whereIsactive(1)->latest()->limit(3)->get();

        switch ($this->themeId) {
            case 1:
                return view('welcome',compact('blogs'));
                break;
            case 2:
                return view('themes.theme2.home-page');
                break;

            default:
                return view('errors.not-found-exception');
                break;
        }
    }

    public function viewitem(Post $post)
    {
        $post->increment('postcount');

        $related_posts = $post->relatedPost()->orderBy('id', 'desc')->take(3)->get(['title','category_id','slug','body']);
        
        switch ($this->themeId) {
            case 1:
                return view('pages.landing-post-view-page',compact('post','related_posts'));
                break;

            case 2:
                return view('themes.theme2.internal-view-page',compact('post','related_posts'));
                break;

            default:
                return view('errors.not-found-exception');
                break;
        }
    }

    public function latestpost()
    {
        switch ($this->themeId) {
            case 1:
                return view('pages.landing-post-lists');
                break;

            case 2:
                return view('themes.theme2.internal-list-page');
                break;

            default:
                return view('errors.not-found-exception');
                break;
        }
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

        $content = view('feeds.rss-feed', compact('rss_latest_posts','sites'));

        return response($content, 200)->header('Content-Type', 'text/xml');
    }

    public function feed_category(Category $categories)
    {
        $sites = config('rss_config');
        $content = view('feeds.category-feed', compact('categories','sites'));

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

    public function menu_with_page($menuslug, $pageslug)
    {
        $menu_page = Page::with(['menus' => function ($q) use($menuslug){
            $q->where('slug',$menuslug);
        }])->where('slug',$pageslug)->isActive()->firstOrFail();

        // dd($menu_page->menus->name);
        switch ($this->themeId) {
            case 1:
                return view('pages.menu-page',compact('menu_page'));
                break;

            case 2:
                return view('themes.theme2.partials.menu-page', compact('menu_page'));
                break;

            default:
                return view('errors.not-found-exception');
                break;
        }
    }

    public function sitemap()
    {
        switch ($this->themeId) {
            case 1:
            case 2:
                return view('sitemap');
                break;

            default:
                return view('errors.not-found-exception');
                break;
        }
    }   
}
