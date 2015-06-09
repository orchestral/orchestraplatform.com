<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Composers\DocumentationList;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['view']->composer('layouts._navbar', DocumentationList::class);
    }
}
