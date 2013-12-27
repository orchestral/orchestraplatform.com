<?php namespace Platform\Routing;

use App;
use Cache;
use Config;
use File;
use Site;
use View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocumentationController extends BaseController
{

    /**
     * {@inheritdoc}
     */
    protected function setupFilters()
    {
        //
    }

    /**
     * Show documentation.
     *
     * @param  string  $version
     * @param  string  $filename
     * @return Response
     */
    public function show($version, $filename = 'index')
    {
        $version = array_get(Config::get('doc.aliases'), $version, $version);
        list($toc, $document) = $this->getDocumentation($version, $filename);

        Site::set('title', sprintf('%s on v%s', $document->get('title'), $version));

        return View::make('documentation', [
            'toc'      => $toc,
            'document' => $document,
            'version'  => $version,
        ]);
    }

    /**
     * Get documentation base path.
     *
     * @param  string  $version
     * @return string
     */
    protected function getDocumentationPath($version)
    {
        $base = App::make('path.base');

        return "{$base}/docs/{$version}";
    }

    protected function getDocumentation($version, $filename)
    {
        $parser = App::make('doc.parser');
        $path = $this->getDocumentationPath($version);

        if (File::isDirectory("{$path}/src/{$filename}")) {
            $filename = "{$filename}/index";
        }

        $toc = "{$path}/src/contents.md";
        $document = "{$path}/src/{$filename}.md";

        if (! File::exists($toc) or ! File::exists($document)) {
            throw new NotFoundHttpException;
        }

        $toc = Cache::get("doc.{$toc}", function () use ($parser, $toc) {
            $content = $parser->parse(File::get($toc));
            Cache::forever("doc.{$toc}", $content);

            return $content;
        });

        $document = Cache::get("doc.{$document}", function () use ($parser, $document) {
            $content = $parser->parse(File::get($document));
            Cache::forever("doc.{$document}", $content);

            return $content;
        });

        return [$toc, $document];
    }
}
