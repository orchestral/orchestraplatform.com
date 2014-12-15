<?php namespace App\Documentation;

use Kurenai\Document;
use Orchestra\Support\Str;
use Illuminate\Support\Arr;
use App\Processor\Processor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Config\Repository as Config;

class Viewer extends Processor
{
    /**
     * Base path.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Configuration repository instance.
     *
     * @var \Illuminate\Config\Repository
     */
    protected $config;

    /**
     * Documentation file loader instance.
     *
     * @var \App\Documentation\FileLoader
     */
    protected $loader;

    /**
     * Construct a new documentation processor.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Contracts\Config\Repository  $config
     * @param  \App\Documentation\FileLoader  $loader
     */
    public function __construct(Application $app, Config $config, FileLoader $loader)
    {
        $this->basePath = $app->basePath();
        $this->config = $config;
        $this->loader = $loader;
    }

    /**
     * Show a documentation.
     *
     * @param  object  $listener
     * @param  string  $version
     * @param  string  $filename
     * @return mixed
     */
    public function show($listener, $version, $filename = 'index')
    {
        $version = (string) Arr::get($this->config->get('doc.aliases'), $version, $version);
        $path = $this->getDocumentationPath($version);

        list($toc, $document) = $this->loader->getDocumentation($path, $filename);

        $redirect = $document->get('see');

        if (!is_null($redirect)) {
            $redirect = $this->parseContent($redirect, $version);

            !Str::startsWith($redirect, 'http') && $redirect = handles("app::{$redirect}");

            return $listener->redirect($redirect);
        }

        return $listener->showSucceed($version, $toc, $document);
    }

    /**
     * Parse HTML/Content from markdown.
     *
     * @param  \Kurenai\Document  $content
     * @param  string  $version
     * @return string
     */
    public function parseMarkdown(Document $content, $version)
    {
        return $this->parseContent($content->getHtmlContent(), $version);
    }

    /**
     * Parse HTML/Content from string.
     *
     * @param  string  $content
     * @param  string  $version
     * @return string
     */
    public function parseContent($content, $version)
    {
        $replacement = [
            'doc-url' => handles("app::docs")."/{$version}",
        ];

        return Str::replace($content, $replacement);
    }

    /**
     * Get documentation base path.
     *
     * @param  string  $version
     * @return string
     */
    protected function getDocumentationPath($version)
    {
        return "{$this->basePath}/docs/{$version}";
    }
}
