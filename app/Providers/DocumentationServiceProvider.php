<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DocumentationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Kurenai\Contracts\Document', 'Kurenai\Document');
        $this->app->bind('Kurenai\Contracts\MarkdownParser', 'Kurenai\Parser\ParsedownExtra');
    }
}
