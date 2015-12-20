<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchestra\Extension\Traits\DomainAwareTrait;

class AppServiceProvider extends ServiceProvider
{
    use DomainAwareTrait;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('config')->set('orchestra/extension::handles.app', '//{{domain}}');
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->registerDomainAwareness();
    }
}
