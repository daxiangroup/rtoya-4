<?php namespace Rtoya\Art;

use Illuminate\Support\ServiceProvider;

class ArtServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('rtoya/art');
        include(__DIR__.'/../../routes.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Art', function()
        {
            return new Art;
        });
        $this->app->bind('ArtPhoto', function()
        {
            return new ArtPhoto;
        });
        $this->app->bind('ArtService', function()
        {
            return new ArtService;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
