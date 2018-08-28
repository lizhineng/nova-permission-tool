<?php

namespace Lizhineng\PermissionTool;

use Laravel\Nova\Nova;
use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerResources();

        Nova::resources([
            Role::class,
            Permission::class,
        ]);
    }

    /**
     * Register the package's publishable resource.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/permission-tool.php' => config_path('permission-tool.php'),
        ], 'permission-tool-config');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/permission-tool'),
        ], 'permission-tool-lang');
    }

    /**
     * Register the package resources such as routes, templates, etc.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'permission-tool');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'permission-tool');
        $this->loadJsonTranslationsFrom(resource_path('lang/vendor/permission-tool'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
