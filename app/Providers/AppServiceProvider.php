<?php

namespace App\Providers;

use App\User;
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
        JsonResource::withoutWrapping();
        Paginator::useBootstrap();
        # this method is moved in User model with boot method
        // User::created(function ($user){
        //     $user->assignRole(3);
        // });
    }
}
