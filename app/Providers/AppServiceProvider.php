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
            ['components.homefooterpage', 'livewire.landing-page.right-sidebar'], 'App\Http\View\Composers\PostComposer',
        );
        View::composer(
            ['components.homefooterpage', 'livewire.landing-page.right-sidebar'], 'App\Http\View\Composers\CategoryComposer',
        );
        View::composer(
            ['livewire.landing-page.right-sidebar'], 'App\Http\View\Composers\TagComposer',
        );
        JsonResource::withoutWrapping();
        Paginator::useBootstrap();
        # this method is moved in User model with boot method
        // User::created(function ($user){
        //     $user->assignRole(3);
        // });
    }
}
