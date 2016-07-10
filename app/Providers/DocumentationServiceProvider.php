<?php

namespace App\Providers;

use Kurenai\Document;
use Kurenai\Parser\ParsedownExtra;
use Illuminate\Support\ServiceProvider;
use Kurenai\Contracts\Document as DocumentContract;
use Kurenai\Contracts\MarkdownParser as MarkdownParserContract;

class DocumentationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DocumentContract::class, Document::class);
        $this->app->bind(MarkdownParserContract::class, ParsedownExtra::class);
    }
}
