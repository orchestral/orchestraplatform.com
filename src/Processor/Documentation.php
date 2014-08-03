<?php namespace Platform\Processor;

use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Orchestra\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Documentation extends AbstractableProcessor
{
    /**
     * Cache repository instance.
     *
     * @var \Illuminate\Cache\Repository
     */
    protected $cache;

    /**
     * Configuration repository instance.
     *
     * @var \Illuminate\Config\Repository
     */
    protected $config;

    /**
     * Filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Parser instance.
     *
     * @var object
     */
    protected $parser;

    /**
     * Base path.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Construct a new documentation processor.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @param  \Illuminate\Cache\Repository       $cache
     * @param  \Illuminate\Config\Repository      $config
     * @param  \Illuminate\Filesystem\Filesystem  $files
     */
    public function __construct(Application $app, CacheRepository $cache, ConfigRepository $config, Filesystem $files)
    {
        $this->parser = $app->make('doc.parser');
        $this->basePath = $app['path.base'];
        $this->cache = $cache;
        $this->config = $config;
        $this->files = $files;
    }

    public function show($listener, $version, $filename = 'index')
    {
        $version = Arr::get($this->config->get('doc.aliases'), $version, $version);

        list($toc, $document) = $this->getDocumentation($version, $filename);

        $redirect = $document->get('see');

        if (! is_null($redirect)) {
            return $listener->redirect(handles("app::{$redirect}"));
        }

        return $listener->showSucceed($version, $toc, $document);
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

    /**
     * Get documentation by version and filename.
     *
     * @param  string  $version
     * @param  string  $filename
     * @return array
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function getDocumentation($version, $filename)
    {
        $path = $this->getDocumentationPath($version);

        if ($this->files->isDirectory("{$path}/src/{$filename}")) {
            $filename = "{$filename}/index";
        }

        $toc = "{$path}/src/contents.md";
        $document = "{$path}/src/{$filename}.md";

        if (! $this->files->exists($toc) or ! $this->files->exists($document)) {
            throw new NotFoundHttpException;
        }

        return [
            $this->getTableOfContent($toc),
            $this->getBodyContent($document),
        ];
    }

    /**
     * Get table of content.
     *
     * @param  string   $toc
     * @return string
     */
    protected function getTableOfContent($toc)
    {
        return $this->cache->get("doc.{$toc}", function () use ($toc) {
            $content = $this->parser->parse($this->files->get($toc));
            $this->cache->forever("doc.{$toc}", $content);

            return $content;
        });
    }

    /**
     * Get content body.
     *
     * @param  string   $document
     * @return mixed
     */
    protected function getBodyContent($document)
    {
        return $this->cache->get("doc.{$document}", function () use ($document) {
            $content = $this->parser->parse($this->files->get($document));
            $this->cache->forever("doc.{$document}", $content);

            return $content;
        });
    }
}
