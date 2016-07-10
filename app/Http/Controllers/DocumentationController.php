<?php

namespace App\Http\Controllers;

use Kurenai\Document;
use App\Documentation\Viewer;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocumentationController extends BaseController
{
    /**
     * Construct a new DocumentationController.
     *
     * @param  \App\Documentation\Viewer  $processor
     */
    public function __construct(Viewer $processor)
    {
        $this->processor = $processor;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function setupMiddleware()
    {
        //
    }

    /**
     * Show documentation index.
     *
     * @param  string   $version
     *
     * @return mixed
     */
    public function index($version)
    {
        return $this->show($version, 'index');
    }

    /**
     * Show documentation.
     *
     * @param  string   $version
     * @param  string   $filename
     *
     * @return mixed
     */
    public function show($version, $filename = 'index')
    {
        return $this->processor->show($this, $version, $filename);
    }

    /**
     * Redirect.
     *
     * @param  string  $to
     *
     * @return mixed
     */
    public function redirect($to)
    {
        return redirect($to, 301);
    }

    /**
     * Display documentation.
     *
     * @param  string  $version
     * @param  \Kurenai\Document  $toc
     * @param  \Kurenai\Document  $document
     *
     * @return mixed
     */
    public function showDocumentation($version, Document $toc, Document $document)
    {
        set_meta('title', sprintf('%s on v%s', $document->get('title'), $version));
        set_meta('doc:version', $version);

        return view('documentation', [
            'toc'      => $toc,
            'document' => $document,
            'version'  => $version,
            'html'     => [
                'toc'      => $this->processor->parseMarkdown($toc, $version),
                'document' => $this->processor->parseMarkdown($document, $version),
            ],
        ]);
    }

    /**
     * Handle documentation not found.
     *
     * @param \Illuminate\Contracts\Filesystem\FileNotFoundException  $e
     * @param string  $version
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function documentationNotFound(FileNotFoundException $e, $version)
    {
        set_meta('doc:version', $version);

        throw new NotFoundHttpException();
    }
}
