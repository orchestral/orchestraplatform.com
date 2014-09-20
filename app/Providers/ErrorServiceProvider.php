<?php namespace App\Providers;

use Exception;
use Log;
use Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\ServiceProvider;

class ErrorServiceProvider extends ServiceProvider
{
    /**
     * Register any error handlers.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may handle any errors that occur in your application, including
        // logging them or displaying custom views for specific errors. You may
        // even register several error handlers to handle different types of
        // exceptions. If nothing is returned, the default error view is
        // shown, which includes a detailed stack trace during debug.

        $this->app->missing(function () {
            return Response::view('404', [], 404);
        });

        $this->app->error(function (ModelNotFoundException $e) {
            return Response::view('404', [], 404);
        });

        $this->app->error(function (Exception $exception, $code) {
            Log::error($exception);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
