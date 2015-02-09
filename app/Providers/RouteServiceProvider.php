<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Orchestra\Contracts\Foundation\Foundation;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        //
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Orchestra\Contracts\Foundation\Foundation  $foundation
     * @return void
     */
    public function map(Foundation $foundation)
    {
        $foundation->group('app', '/', ['namespace' => $this->namespace], function (Router $router) {
            require app_path('Http/routes.php');
        });
    }
}
