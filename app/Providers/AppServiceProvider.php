<?php

namespace App\Providers;
use App\Providers\Schema;
use Illuminate\Support\ServiceProvider;
use League\Config\SchemaBuilderInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        /*Schema::defaultStringLength(200);*/
    }
}
