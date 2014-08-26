<?php namespace App\Http\Controllers;

use Orchestra\Support\Facades\Site;
use Illuminate\Support\Facades\View;
use Orchestra\Support\Str;
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

        parent::__construct();
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($version, $filename = 'index')
    {
        return $this->processor->show($this, $version, $filename);
    }

    /**
     * Display documentation.
     *
     * @param  string   $version
     * @param  string   $toc
     * @param  object   $document
     * @return mixed
     */
    public function showSucceed($version, $toc, $document)
    {
        Site::set('title', sprintf('%s on v%s', $document->get('title'), $version));

        return View::make('documentation', [
            'toc'      => $toc,
            'document' => $document,
            'version'  => $version,
            'html'     => [
                'toc'      => $this->processor->parseMarkdown($toc, $version),
                'document' => $this->processor->parseMarkdown($document, $version),
            ],
        ]);
    }
}
