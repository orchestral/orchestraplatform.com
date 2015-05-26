<?php namespace App\Providers;

use Kurenai\Document;
use Kurenai\DocumentParser;
use Kurenai\Parser\ParsedownExtra;
use Illuminate\Support\ServiceProvider;
use Orchestra\Support\Providers\Traits\AliasesProviderTrait;

class DocumentationServiceProvider extends ServiceProvider
{
    use AliasesProviderTrait;

    /**
     * List of aliases.
     *
     * @var array
     */
    protected $aliases = [
        'doc.parser' => 'Kurenai\DocumentParser',
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('doc.parser', function () {
            return new DocumentParser(new Document(new ParsedownExtra()));
        });

        $this->registerCoreContainerAliases();
    }
}
