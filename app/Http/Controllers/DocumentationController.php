<?php namespace App\Http\Controllers;

use Kurenai\Document;
use App\Documentation\Viewer;

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
    protected function setupFilters()
    {
        //
    }

    /**
     * Show documentation index.
     *
     * @Get("docs/{version}")
     * @Where({"version": "([a-zA-Z0-9\.]+)"})
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
     * @Get("docs/{version}/{filename}")
     * @Where({"version": "([a-zA-Z0-9\.]+)", "filename": "(.+)?"})
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
     * Display documentation.
     *
     * @param  string  $version
     * @param  \Kurenai\Document  $toc
     * @param  \Kurenai\Document  $document
     *
     * @return mixed
     */
    public function showSucceed($version, Document $toc, Document $document)
    {
        set_meta('title', sprintf('%s on v%s', $document->get('title'), $version));

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
}
