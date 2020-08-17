<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    // Route::get('/home', 'HomeController@index')->name('home');


    Route::get('/dashboard','SuperAdmin\SuperAdminController@index')->name('dashboard');

    Route::get('superadmin/auth/create', 'SuperAdmin\SuperAdminController@create')->name('auth.create');

    Route::post('superadmin/auth/create', 'SuperAdmin\SuperAdminController@store')->name('auth.store');
