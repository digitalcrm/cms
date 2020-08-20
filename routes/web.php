<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    // Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['namespace' => 'SuperAdmin'], function () {

        Route::get('/dashboard','SuperAdminController@index')->name('dashboard');

        Route::group(['middleware' => ['role:superadmin|admin']], function () {
            # user create only by superADMIN and admin

            Route::get('auth/create', 'SuperAdminController@create')->name('auth.create')->middleware('permission:user-create');

            Route::post('auth/create', 'SuperAdminController@store')->name('auth.store');

            Route::get('/all-users','SuperAdminController@getAllUsers')->name('all-users')->middleware('permission:all-users');
        });
    });

    Route::group(['namespace' => 'Posts'], function () {
        Route::resource('posts', 'PostController');
    });

    Route::group(['namespace' => 'Category'], function () {
        Route::resource('category', 'CategoryController');
    });

    Route::group(['namespace' => 'Tag'], function () {
        Route::resource('tag', 'TagController');
    });

    Route::group(['namespace' => 'RoleManagement'], function () {
        Route::resource('permission', 'PermissionController');
        Route::resource('role', 'RoleController');
    });
