<?php namespace TestCase\Platform\Routing;

use Site;
use View;
use Mockery as m;
use TestCase\TestCase;

class DocumentationControllerTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testDocsRoute()
    {
        $processor = m::mock('\Platform\Processor\Documentation');
        $toc       = m::mock('\Kurenai\Document');
        $document  = m::mock('\Kurenai\Document');

        $toc->shouldReceive('getHtmlContent')->andReturn('toc');
        $document->shouldReceive('get')->once()->with('title')->andReturn('Documentation')
            ->shouldReceive('getHtmlContent')->andReturn('document');

        $processor->shouldReceive('show')->once()
            ->andReturnUsing(function ($listener) use ($toc, $document) {
                return $listener->showSucceed('2.0', $toc, $document);
            });
        $this->app->instance('Platform\Processor\Documentation', $processor);

        Site::shouldReceive('set')->once()->with('title', m::any())->andReturnNull();
        View::shouldReceive('make')->once()->with('documentation', m::type('Array'))->andReturn('documentation');

        $this->call('GET', 'docs/2.0/index');

        $this->assertResponseOk();
    }
}
