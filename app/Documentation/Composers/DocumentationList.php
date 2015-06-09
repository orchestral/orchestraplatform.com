<?php namespace App\Documentation\Composers;

use App\Documentation\Document;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Routing\UrlGenerator;
use Orchestra\Contracts\Foundation\Foundation;

class DocumentationList
{
    const LTS    = 'lts';
    const STABLE = 'stable';
    const EOL    = 'eol';

    /**
     * @var \Orchestra\Contracts\Foundation\Foundation
     */
    protected $foundation;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var \Illuminate\Contracts\Routing\UrlGenerator
     */
    protected $urlGenerator;

    /**
     * Construct a new view composer.
     *
     * @param  \Orchestra\Contracts\Foundation\Foundation  $foundation
     * @param  \Illuminate\Contracts\Routing\UrlGenerator  $urlGenerator
     * @param  \Illuminate\Http\Request  $request
     */
    public function __construct(Foundation $foundation, UrlGenerator $urlGenerator, Request $request)
    {
        $this->foundation   = $foundation;
        $this->urlGenerator = $urlGenerator;
        $this->request      = $request;
    }

    /**
     * Compose to view.
     *
     * @param  \Illuminate\Contracts\View\View  $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $documentation = $this->buildDocumentationUrl([
            new Document('3.1', Document::LTS, "app::docs/3.1/"),
            new Document('3.0', Document::STABLE, "app::docs/3.0/"),
            new Document('2.2', Document::EOL, "app::docs/2.2/"),
            new Document('2.1', Document::LTS, "app::docs/2.1/"),
            new Document('2.0', Document::EOL, "app::docs/2.0/"),
        ]);

        $view->with(compact('documentation'));
    }

    /**
     * Build documentation URL.
     *
     * @param  array  $documentation
     *
     * @return array
     */
    protected function buildDocumentationUrl(array $documentation)
    {
        $current = $this->request->segment(2);

        foreach ($documentation as $doc) {
            $ver = $doc->getVersion();

            if ($ver !== $current && $this->foundation->is('app::docs*')) {
                $doc->setURL(strtr($this->urlGenerator->current(), [$current => $ver]));
            }
        }

        return $documentation;
    }
}
