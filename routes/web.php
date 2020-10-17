<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes(['verify' => true]);

    /** Ajax routes */

    Route::group(['middleware' => ['auth'], 'namespace' => 'Ajax'], function () {

        Route::get('userStatus','AjaxController@userStatus')->name('auth.userStatus');

    });


    /** Basic Routes */

    Route::group(['middleware' => ['verified']], function () {

        Route::group(['namespace' => 'SuperAdmin'], function () {

            Route::get('/dashboard','SuperAdminController@index')->name('dashboard');

            Route::group(['middleware' => ['role:superadmin|admin']], function () {
                # user create only by superADMIN and admin

                Route::get('auth/create', 'SuperAdminController@create')->name('auth.create')->middleware('permission:user-create');

                Route::post('auth/create', 'SuperAdminController@store')->name('auth.store')->middleware('permission:user-create');

                Route::get('/all-users','SuperAdminController@getAllUsers')->name('all-users')->middleware('permission:all-users');
            });


        }); /** SuperAdmin route group End Here */

        /** User Profile Routes */
        Route::group(['namespace' => 'Profile'], function () {

            Route::resource('auth_profile', 'UserProfileController');

        });

        /** Post Category Tag routes Rolemanagement */
        Route::group(['namespace' => 'Posts'], function () {
            Route::resource('posts', 'PostController');
            Route::put('posts/isactive/{isActive}','PostController@isActive')->name('posts.status');
        });

        Route::group(['namespace' => 'Category'], function () {
            Route::resource('category', 'CategoryController');

            Route::resource('subcategory', 'SubCategoryController');
        });

        Route::group(['namespace' => 'Tag'], function () {
            Route::resource('tag', 'TagController');
        });

        Route::group(['namespace' => 'RoleManagement'], function () {
            Route::resource('permission', 'PermissionController');
            Route::resource('role', 'RoleController');
        });

    }); /** verfied Routes End Here */


/*##############################################################################################
                            Booking Routes
###############################################################################################*/

Route::group(['namespace' => 'Bookings'], function () {

        /* Booking Services routes */
        Route::resource('bookservices', 'BookingServiceController')->except([
            'create', 'store', 'update', 'destroy', 'show', 'edit',
        ]);

        /* Booking Create Events routes*/
        Route::resource('bookevents', 'BookingEventController');

        /* list of services at front side */
        Route::get('bookings', 'BookingController')->name('bookings');

        /* calendar list */
        Route::get('calendar', 'BookingEventController@allBookingEvent')->name('allBookingEvent');
        Route::get('bookingeventdata', 'BookingEventController@calendarlist');

        /* services having list of events show */
        Route::get('bookings/{bookservice:service_name}', 'BookingHomePageController@service_has_list_of_events')->name('service.events');

        /* guest user Booking form route */
        Route::get('bookings/{bookservice:service_name}/event/{bookevent}', 'BookingHomePageController@create')->name('event.create');
        Route::post('bookings/{bookservice:service_name}/event/{bookevent}', 'BookingHomePageController@store')->name('event.store');

    });

    /* Setting controller invokable */

    Route::group(['namespace' => 'Settings'], function () {
        Route::get('settings', 'SettingController')->name('settings');
    });



/*##############################################################################################
                            Booking Routes End
###############################################################################################*/


    Route::get('cache_delete', function(){
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return 'cache cleared';
    });
