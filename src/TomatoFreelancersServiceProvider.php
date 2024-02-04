<?php

namespace TomatoPHP\TomatoFreelancers;

use Illuminate\Support\ServiceProvider;


class TomatoFreelancersServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoFreelancers\Console\TomatoFreelancersInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-freelancers.php', 'tomato-freelancers');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-freelancers.php' => config_path('tomato-freelancers.php'),
        ], 'tomato-freelancers-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-freelancers-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-freelancers');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-freelancers'),
        ], 'tomato-freelancers-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-freelancers');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => base_path('lang/vendor/tomato-freelancers'),
        ], 'tomato-freelancers-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }

    public function boot(): void
    {
        //you boot methods here
    }
}
