<?php

namespace App\Http\Controllers\Posts;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostStoreRequest;

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
        // $query = Post::with('user');

        if(auth()->user()->hasRole('superadmin')) {
            $allPosts = Post::has('user')->latest()->get();

        } elseif (auth()->user()->hasRole('admin')) {
            $allPosts = Post::whereHas('user', function($query){
                $query->where('user_id','!=',1);
            })->latest()->get();

        } else {
            $allPosts = Post::whereHas('user', function($query){
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
            'categories' => Category::get(['id','name']),
            'tags' => Tag::get(['id','name']),
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

        $posts = auth()->user()->posts()->create($input);

        $posts->tags()->attach(request('tags'));

        // if($request->hasFile('path')){

        //     $originalname = $request->path->getClientOriginalName();

        //     $extension = $request->path->extension();

        //     $uploadpath = $request->path->storeAs('media', $originalname, 'public');//filepath=>media/filename.png

        //     $photo = Photo::create(['file'=> $originalname]);

        //     // $input['photo_id'] = $photo->id;
        //     $posts->photo()->associate($photo->id);

        //     $posts->save();

        // }

        return redirect(route('posts.index'))->with('message','post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd(auth()->user()->id);
        if (auth()->user()->hasRole('superadmin')) {

            return view('cms.posts.show',compact('post'));

        } elseif (auth()->user()->hasRole('user')) {

            abort_if((Auth::id() != $post->user_id), 403);
                return view('cms.posts.show',compact('post'));
        }
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
        $categories = Category::get(['id','name']);

        $post->load('tags');

        if (auth()->user()->hasRole('superadmin')) {

            return view('cms.posts.edit',compact('categories','tags','post'));

        } elseif(auth()->user()->hasRole('user')) {

            abort_if((Auth::id() != $post->user_id), 403);
            return view('cms.posts.edit',compact('categories','tags','post'));
        }
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
        $input = $request->validated();

        // if($request->hasFile('path')){

        //     $originalname = $request->path->getClientOriginalName();

        //     $extension = $request->path->extension();

        //     $uploadpath = $request->path->storeAs('media', $originalname, 'public');//filepath=>media/filename.png

        //     if ($post->photo_id != Null) {//if their is already photo then update it

        //         $post->photo->update([

        //             'file'=>$originalname

        //             ]);
        //     } else { //if no photo then associate and create

        //         $post->photo()->associate(

        //             Photo::create([
        //                 'file' => $originalname
        //             ])

        //         );
        //     }

        //     $post->save();

        // }

        $post->update($input);

        $post->tags()->sync(request('tags'));

        return redirect(route('posts.index'))->with('message','Posts updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('posts.index'))->with('message','Posts deleted succesfully');
    }
}
