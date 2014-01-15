<?php namespace Platform\Routing;

use Site;
use View;
use Platform\Processor\Documentation as DocumentationProcessor;

class DocumentationController extends BaseController
{
    /**
     * Construct a new DocumentationController.
     *
     * @param  \Platform\Processor\Documentation  $processor
     */
    public function __construct(DocumentationProcessor $processor)
    {
        $this->processor = $processor;
    }

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
        return $this->processor->show($this, $version, $filename);
    }

    public function showSucceed($version, $toc, $document)
    {
        Site::set('title', sprintf('%s on v%s', $document->get('title'), $version));

        return View::make('documentation', [
            'toc'      => $toc,
            'document' => $document,
            'version'  => $version,
        ]);
    }
}
