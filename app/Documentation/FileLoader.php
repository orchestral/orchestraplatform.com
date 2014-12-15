<?php namespace App\Documentation;

use Kurenai\DocumentParser;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FileLoader
{
    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @var Filesystem
     */
    protected $files;

    /**
     * @var DocumentParser
     */
    protected $parser;

    /**
     * @param Cache $cache
     * @param Filesystem $files
     * @param DocumentParser $parser
     */
    public function __construct(Cache $cache, Filesystem $files, DocumentParser $parser)
    {
        $this->cache = $cache;
        $this->files = $files;
        $this->parser = $parser;
    }

    /**
     * Get documentation by version and filename.
     *
     * @param  string  $path
     * @param  string  $filename
     * @return array
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function getDocumentation($path, $filename)
    {
        if ($this->files->isDirectory("{$path}/src/{$filename}")) {
            $filename = "{$filename}/index";
        }

        $toc = "{$path}/src/contents.md";
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
     * @return string
     */
    protected function getTableOfContent($toc)
    {
        return $this->cache->get("doc.{$toc}", function () use ($toc) {
            $this->validateFileDoesExist($toc);

            $content = $this->parser->parse($this->files->get($toc));
            $this->cache->forever("doc.{$toc}", $content);

            return $content;
        });
    }

    /**
     * Get content body.
     *
     * @param  string  $document
     * @return mixed
     */
    protected function getBodyContent($document)
    {
        return $this->cache->get("doc.{$document}", function () use ($document) {
            $this->validateFileDoesExist($document);

            $content = $this->parser->parse($this->files->get($document));
            $this->cache->forever("doc.{$document}", $content);

            return $content;
        });
    }

    /**
     * Validate if file does exist.
     * @param  string  $file
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function validateFileDoesExist($file)
    {
        if (! $this->files->exists($file)) {
            throw new NotFoundHttpException;
        }
    }
}
