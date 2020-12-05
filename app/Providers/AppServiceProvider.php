<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['components.home-footer-page', 'livewire.landing-page.right-sidebar'], 'App\Http\View\Composers\PostComposer',
        );
        View::composer(
            ['components.home-footer-page', 'livewire.landing-page.right-sidebar'], 'App\Http\View\Composers\CategoryComposer',
        );
        View::composer(
            ['livewire.landing-page.right-sidebar'], 'App\Http\View\Composers\TagComposer',
        );

        View::composer('layouts.partials.favicons', 'App\Http\View\Composers\LogoManagementComposer');
        View::composer('layouts.partials.homepage-logo', 'App\Http\View\Composers\HomePageLogoComposer');
        View::composer('layouts.partials.admin-panel-logo', 'App\Http\View\Composers\AdminPanelLogoComposer');

        JsonResource::withoutWrapping();
        Paginator::useBootstrap();
        # this method is moved in User model with boot method
        // User::created(function ($user){
        //     $user->assignRole(3);
        // });
    }
}
