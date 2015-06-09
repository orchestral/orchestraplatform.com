<?php namespace App\Documentation\Composers;

use Illuminate\Http\Request;
use App\Documentation\Version;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Routing\UrlGenerator;
use Orchestra\Contracts\Foundation\Foundation;

class DocumentationVersionList
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
            new Version('3.1', Version::LTS),
            new Version('3.0', Version::STABLE),
            new Version('2.2', Version::EOL),
            new Version('2.1', Version::LTS),
            new Version('2.0', Version::EOL),
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
            $code = $doc->getCode();

            if ($code !== $current && $this->foundation->is('app::docs*')) {
                $doc->setURL(strtr($this->urlGenerator->current(), [$current => $code]));
            }
        }

        return $documentation;
    }
}
