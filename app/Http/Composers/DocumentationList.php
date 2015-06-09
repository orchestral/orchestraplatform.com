<?php namespace App\Http\Composers;

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
            '3.1' => ['status' => self::LTS],
            '3.0' => ['status' => self::STABLE],
            '2.2' => ['status' => self::EOL],
            '2.1' => ['status' => self::LTS],
            '2.0' => ['status' => self::EOL],
        ]);

        $status = [
            self::LTS    => ['label' => 'info', 'name' => 'LTS'],
            self::STABLE => ['label' => 'success', 'name' => 'STABLE'],
            self::EOL    => ['label' => 'danger', 'name' => 'EOL'],
        ];

        $view->with(compact('documentation', 'status'));
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

        foreach ($documentation as $ver => &$doc) {
            $doc['url'] = "app::docs/{$ver}/";

            if ($ver !== $current && $this->foundation->is('app::docs*')) {
                $doc['url'] = strtr($this->urlGenerator->current(), [$current => $ver]);
            }
        }

        return $documentation;
    }
}
