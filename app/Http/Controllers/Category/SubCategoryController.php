<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;
use App\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:subcategory-list')->only('index');
        $this->middleware('permission:subcategory-create')->only('create');
        $this->middleware('permission:subcategory-view')->only('view');
        $this->middleware('permission:subcategory-edit')->only('edit');
        $this->middleware('permission:subcategory-delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSubcategory = Subcategory::get();
        return view('cms.subcategories.index',compact('allSubcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategory = Category::get()->pluck('name','id');

        return view('cms.subcategories.create',compact('parentCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        $validatedData = $request->validated();

        Subcategory::create($validatedData);

        return redirect(route('subcategory.index'))->withMessage('sub category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('cms.subcategories.view',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $parentCategory = Category::get()->pluck('name','id');
        return view('cms.subcategories.edit',compact('subcategory','parentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $validatedData = $request->validated();

        $subcategory->update($validatedData);

        return redirect(route('subcategory.index'))->withInfo('sub category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect(route('subcategory.index'))->withMessage('sub category deleted successfully');
    }
}
