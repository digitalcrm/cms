<?php

namespace App\Http\Controllers\Media;

use App\Gallary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:superadmin|admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallary.grid-media');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function show(Gallary $gallary)
    {
        // $size = getimagesize($gallary->imageUrl());
        // $size = filesize($gallary->imageUrl());
        // dd($size);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallary $gallary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallary $gallary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallary $gallary)
    {
        $gallary->delete();
        return redirect()->back()->withMessage('Image deleted successfully');
    }
}
