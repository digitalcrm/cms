<?php

namespace App\Http\Controllers\Posts;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PostStoreRequest;
use App\Subcategory;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->authorizeResource('posts');
        $this->middleware('permission:list-post')->only('index');
        $this->middleware('permission:create-post')->only('create');
        $this->middleware('permission:view-post')->only('view');
        $this->middleware('permission:edit-post')->only('edit');
        $this->middleware('permission:delete-post')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()->hasRole('superadmin'));
        $query = Post::query();

        if(auth()->user()->hasRole('superadmin')) {
            $allPosts = $query->has('user')->latest()->get();

        } elseif (auth()->user()->hasRole('admin')) {
            $allPosts = $query->whereHas('user', function($query){
                $query->where('user_id','!=',1);
            })->latest()->get();

        } else {
            $allPosts = $query->whereHas('user', function($query){
                $query->where('user_id',auth()->user()->id);
            })->latest()->get();
        }
        return view('cms.posts.index',compact('allPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.posts.create',[
            'tags' => Tag::get(['id','name']),
            // 'subcategories' => Subcategory::where('category_id',1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $input = $request->validated();
        // dd($input);
        $posts = auth()->user()->posts()->create($input);

        $posts->tags()->attach(request('tags'));

        if($request->hasFile('featuredimage')){

            $posts->addMedia($request->featuredimage)
                    ->toMediaCollection('posts');

        }

        return redirect(route('posts.index'))->withMessage('post 😊 created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // if (auth()->user()->hasRole('superadmin')) {
        //     return view('cms.posts.show',compact('post'));
        // } elseif (auth()->user()->hasRole('user')) {
        //     abort_if((Auth::id() != $post->user_id), 403);
        //         return view('cms.posts.show',compact('post'));
        // }
        Gate::authorize('view', $post);
            return view('cms.posts.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::get(['id','name']);
        // $categories = Category::get(['id','name']);
        $post->load('tags');

        // if (auth()->user()->hasRole('superadmin')) {
        //     return view('cms.posts.edit',compact('categories','tags','post'));
        // } elseif(auth()->user()->hasRole('user')) {
        //     abort_if((Auth::id() != $post->user_id), 403);
        //     return view('cms.posts.edit',compact('categories','tags','post'));
        // }

        Gate::authorize('update', $post);
            return view('cms.posts.edit',compact('tags','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, Post $post)
    {
        // dd($request->input('featuredimage', false));
        $input = $request->validated();

        $post->update($input);

        $post->tags()->sync(request('tags'));

        if($request->hasFile('featuredimage')){
            $post->addMedia($request->featuredimage)->toMediaCollection('posts');
        }

        // if ($request->input('featuredimage', false)) {
        //     if (!$post->featured_image || $request->input('featuredimage') !== $post->featured_image->file_name) {
        //         $post->addMedia($request->featuredimage)->toMediaCollection('posts');
        //     }
        // } elseif ($post->featured_image) { // y tab run hoga jab post k pass phele se image hai but upload nhi kiya to delete
        //     $post->featured_image->delete();
        // }

        return redirect(route('posts.index'))->withInfo('Posts updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();

        return redirect(route('posts.index'))->with('message','Posts deleted succesfully');
    }
}
