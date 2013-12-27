<?php namespace Platform;

use Illuminate\Support\ServiceProvider;
use Kurenai\DocumentParser;
use Kurenai\Document;
use Kurenai\Parser\DflydevMarkdownExtra;
use dflydev\markdown\MarkdownExtraParser;

class PlatformServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var boolean
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('doc.parser', function () {
            return new DocumentParser(function () {
                return new Document(new DflydevMarkdownExtra);
            });
        });
    }

     /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['doc.parser'];
    }
}
