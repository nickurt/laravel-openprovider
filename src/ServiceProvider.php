<?php

namespace nickurt\OpenProvider;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/openprovider.php' => config_path('openprovider.php')
        ], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['nickurt\OpenProvider\OpenProvider', 'OpenProvider'];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nickurt\OpenProvider\OpenProvider', function ($app) {
            $openProvider = new OpenProvider($app);
            $openProvider->connection($openProvider->getDefaultConnection());

            return $openProvider;
        });

        $this->app->alias('nickurt\OpenProvider\OpenProvider', 'OpenProvider');
    }
}
