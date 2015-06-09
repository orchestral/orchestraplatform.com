<?php namespace App\Http\Composers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Routing\UrlGenerator;

class DocumentationList
{
    const LTS    = 'lts';
    const STABLE = 'stable';
    const EOL    = 'eol';

    /**
     * @var \Illuminate\Contracts\Routing\UrlGenerator
     */
    protected $urlGenerator;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Construct a new view composer.
     *
     * @param  \Illuminate\Contracts\Routing\UrlGenerator  $urlGenerator
     * @param  \Illuminate\Http\Request  $request
     */
    public function __construct(UrlGenerator $urlGenerator, Request $request)
    {
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

        $label = [
            self::LTS    => 'info',
            self::STABLE => 'success',
            self::EOL    => 'danger',
        ];

        $view->with(compact('documentation', 'label'));
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

            if ($ver !== $current) {
                $doc['url'] = strtr($this->urlGenerator->current(), [$current => $ver]);
            }
        }

        return $documentation;
    }
}
