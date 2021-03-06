<?php namespace Invisnik\LaravelSteamInventory;

use Illuminate\Cache\CacheManager;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

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
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('steam-inventory.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('steam-inventory', function () {
            $cacheManager = new CacheManager($this->app);
            return new SteamInventory($cacheManager);
        });
    }

}
