<?php

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\V1\Cms\TagCollection;
use App\Http\Resources\V1\Cms\CategoryCollection;
use App\Http\Resources\V1\Cms\SubCategoryCollection;
use App\Tag;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api\V1'], function () {
    Route::apiResources([
        'articles' => PostApiController::class,
    ]);
    Route::get('categories', function() {
        return new CategoryCollection(Category::with('subcategories')->get());
    });
    Route::get('sub-categories', function() {
        return new SubCategoryCollection(Subcategory::has('category')->get());
    });
    Route::get('tags', function() {
        return new TagCollection(Tag::has('posts')->get());
    });
});