<?php

namespace App\Providers;

use App\Repositories\PhongtroRepositories;
use App\Services\PhongtroServices;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PhongtroRepositories::class, function($app){
            return new PhongtroRepositories();
        });

        $this->app->singleton(PhongtroServices::class,function($app){
            return new PhongtroServices($app->make(PhongtroRepositories::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
