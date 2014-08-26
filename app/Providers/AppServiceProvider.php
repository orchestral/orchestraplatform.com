<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kurenai\DocumentParser;
use Kurenai\Document;
use Kurenai\Parser\DflydevMarkdownExtra;
use dflydev\markdown\MarkdownExtraParser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any necessary services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // This service provider is a convenient place to register your services
        // in the IoC container. If you wish, you may make additional methods
        // or service providers to keep the code more focused and granular.

        $this->app->bindShared('doc.parser', function () {
            return new DocumentParser(function () {
                return new Document(new DflydevMarkdownExtra);
            });
        });

        $this->app->middleware('Illuminate\Http\FrameGuard');
    }
}
