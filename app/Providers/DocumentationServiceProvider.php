<?php namespace App\Providers;

use Kurenai\Document;
use Kurenai\DocumentParser;
use Illuminate\Support\ServiceProvider;
use Kurenai\Parser\ParsedownMarkdownExtra;

class DocumentationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('doc.parser', function () {
            return new DocumentParser(function () {
                return new Document(new ParsedownMarkdownExtra);
            });
        });

    }
}
