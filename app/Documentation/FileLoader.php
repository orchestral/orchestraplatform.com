<?php namespace App\Documentation;

use Kurenai\DocumentParser;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FileLoader
{
    /**
     * The cache repository implementation.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * The filesystem implementation.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The markdown parser.
     *
     * @var \Kurenai\DocumentParser
     */
    protected $parser;

    /**
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Kurenai\DocumentParser  $parser
     */
    public function __construct(Cache $cache, Filesystem $files, DocumentParser $parser)
    {
        $this->cache  = $cache;
        $this->files  = $files;
        $this->parser = $parser;
    }

    /**
     * Get documentation by version and filename.
     *
     * @param  string  $path
     * @param  string  $filename
     *
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function getDocumentation($path, $filename)
    {
        if ($this->files->isDirectory("{$path}/src/{$filename}")) {
            $filename = "{$filename}/index";
        }

        $toc      = "{$path}/src/contents.md";
        $document = "{$path}/src/{$filename}.md";

        return [
            $this->getTableOfContent($toc),
            $this->getBodyContent($document),
        ];
    }

    /**
     * Get table of content.
     *
     * @param  string  $toc
     *
     * @return string
     */
    protected function getTableOfContent($toc)
    {
        $parser = $this->parser;

        return $this->cache->rememberForever("doc.{$toc}.html", function () use ($parser, $toc) {
            $content = $this->loadContent($toc);

            return $parser->parse($content);
        });
    }

    /**
     * Get content body.
     *
     * @param  string  $document
     *
     * @return mixed
     */
    protected function getBodyContent($document)
    {
        $content = $this->loadContent($document);

        return $this->parser->parse($content);
    }

    /**
     * Load content.
     *
     * @param  string  $file
     *
     * @return mixed
     */
    protected function loadContent($file)
    {
        return $this->cache->rememberForever("doc.{$file}", function () use ($file) {
            $this->validateFileDoesExist($file);

            return $this->files->get($file);
        });
    }

    /**
     * Validate if file does exist.
     *
     * @param  string  $file
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function validateFileDoesExist($file)
    {
        if (! $this->files->exists($file)) {
            throw new NotFoundHttpException();
        }
    }
}
