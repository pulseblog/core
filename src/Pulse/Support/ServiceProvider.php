<?php namespace Pulse\Support;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * Pulse ServiceProvider
 *
 * This class is used by Laravel in order to register pulse/core
 * into the IoC container.
 *
 * @package  Pulse\Support
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('pulse/core');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRoutes();
        $this->registerCommands();
        $this->registerViews();
    }

    /**
     * Register the blog routes
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $router = new Router;
        $router->registerRoutes($this->app['router']);
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->app->bind('command.pulse.install', function ($app) {
            return new InstallCommand($app);
        });

        $this->commands('command.pulse.install');
    }

    protected function registerViews()
    {
        $this->app->view->addNamespace(
            'pulse', 
            array(
                app_path().'/views/packages/pulse/core',
                __DIR__.'/../../views'
            )
        );
    }
}
