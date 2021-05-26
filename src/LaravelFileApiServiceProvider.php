<?php

namespace Eliyas5044\LaravelFileApi;

use Illuminate\Support\ServiceProvider;

class LaravelFileApiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'eliyas5044');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'eliyas5044');
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-file-api.php', 'laravel-file-api');

        // Register the service the package provides.
        $this->app->singleton('laravel-file-api', function ($app) {
            return new LaravelFileApi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-file-api'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/laravel-file-api.php' => config_path('laravel-file-api.php'),
        ], 'laravel-file-api.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/eliyas5044'),
        ], 'laravel-file-api.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/eliyas5044'),
        ], 'laravel-file-api.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/eliyas5044'),
        ], 'laravel-file-api.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
