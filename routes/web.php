<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Customization\UrlBasedCustomizationController;

    ###################################################Landing Page Post routes############################################################
    Route::get('/', [LandingPageController::class, 'index'])->name('home');
    Route::get('latest', [LandingPageController::class, 'latestpost'])->name('latest.latestpost');
    Route::get('blogs/{post:slug}', [LandingPageController::class, 'viewitem'])->name('post.viewitem');
    Route::get('articles-by-categories', [LandingPageController::class, 'articles_by_category'])->name('lists_of_category');
    Route::get('articles-by-tags', [LandingPageController::class, 'articles_by_tag'])->name('lists_of_tag');
    
    Route::Post('articles-share-to-friend', [LandingPageController::class, 'article_shares_to_friend'])->name('article_share.store');
    Route::get('print/{print_article}', [LandingPageController::class, 'print_article'])->name('article.print_article');
    Route::get('rss_latest_feed', [LandingPageController::class, 'rss_feed'])->name('rss_feed');

    /* Favorite posts routes */
    Route::get('favorite/{posts:slug}/posts',[LandingPageController::class,'favoritePost'])->name('save.post');
    Route::get('unfavorite/{posts:slug}/posts',[LandingPageController::class,'unFavoritePost'])->name('unsaved.post');
    Route::get('sitemap', [LandingPageController::class, 'sitemap'])->name('sitemap');

    ###################################################End Landing Page Post routes############################################################
    Auth::routes(['verify' => true]);

    /** Ajax routes */

    Route::group(['middleware' => ['auth'], 'namespace' => 'Ajax'], function () {

        Route::get('userStatus','AjaxController@userStatus')->name('auth.userStatus');
        Route::get('eventStatus','AjaxController@eventStatus')->name('auth.eventStatus');

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
            Route::get('posts/saved','PostController@auth_user_saved_post')->name('posts.saved');
            Route::resource('posts', 'PostController');
            Route::put('posts/isactive/{isActive}','PostController@isActive')->name('posts.status');
            Route::put('posts/featured/{featured}','PostController@featured')->name('posts.featured');
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

        Route::get('activity_type', 'BookingActivityTypeController')->name('activity_type');

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

        /** Booked Customer */
        Route::resource('confirmed_users', 'BookedCustomerController')->only(['index']);

        /** send booking appointment link to friend */
        Route::resource('booking_shares', 'BookingShareController')->only([
            'store'
        ]);

    });

    /* Setting controller invokable */

    Route::group(['namespace' => 'Settings'], function () {
        Route::get('settings', [SettingController::class,'index'])->name('settings');
        Route::get('setting-appointments', [SettingController::class,'appointment_setting'])->name('appointments');
        Route::get('setting-general', [SettingController::class,'general_setting'])->name('generals');
        Route::get('setting-cms', [SettingController::class,'cms_setting'])->name('cms_settings');

        ###########################################CMS Settings#################################################
        Route::resource('cms-visibility','CmsSettingController')->only(['index','update']);

    });



/*##############################################################################################
                        Booking Routes End /Newsletter Routes Start
###############################################################################################*/

    Route::get('subcripition-confirmed','Newsletter\NewsletterController@confirm_subscription')->name('confirmed.subscription');
    Route::get('newsletters','Newsletter\NewsletterController@subscriber_list')->name('subscribers');
    Route::get('newsletters/create','Newsletter\NewsletterController@create')->name('newsletters.create');
    Route::post('newsletters/create','Newsletter\NewsletterController@store')->name('newsletters.store');
    Route::get('subscription-delete','Newsletter\NewsletterController@subscription_delete')->name('newsletters.unsubscribe');
    Route::get('newsletter/emails','Newsletter\NewsletterController@sent_email_list')->name('newsletter.emails');

    ###########################################Export/Import Routes#################################################
    Route::get('newsletter/export/', 'Newsletter\ExportImportController@export')->name('exports_subscribers');
    Route::get('newsletter/imports/', 'Newsletter\ExportImportController@import')->name('imports_subscribers');
    Route::post('newsletter/imports/', 'Newsletter\ExportImportController@store')->name('store_subscribers.store');


    ###########################################Theme Customization#################################################

    Route::get('customization', Customization\CustomizationController::class)->name('customize');
    Route::put('slider/{update}', [UrlBasedCustomizationController::class, 'sliderupdate'])->name('slider.update');

    ###########################################Theme Customization#################################################
    Route::resource('themes', ThemeController::class)->only(['index','update']);
    
    ###########################################Page/Menu Routes#################################################
    Route::resource('pages', Page\PageController::class);
    Route::resource('menus', Menu\MenuController::class);
    Route::get('menus/{menuslug}/{pageslug}', [LandingPageController::class, 'menu_with_page'])->name('menu.page');
    
    Route::resource('comments', Comments\CommentController::class);
    Route::post('post-comment/{thread}', 'Comments\CommentController@addCommentPost')->name('thread.comment');


    ####################################################Gallary System###################################################
    Route::resource('gallaries', Media\GallaryController::class);
    
    ######################################################################################################################
    Route::get('cache_delete', function(){
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return 'cache cleared';
    })->middleware('auth');

    Route::get('php-infos', function(){
        return phpinfo(INFO_MODULES);
    });
