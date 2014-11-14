<?php namespace TestCase\App\Http\Controllers;

use Mockery as m;
use TestCase\TestCase;
use Orchestra\Support\Facades\Meta;
use Illuminate\Support\Facades\View;

class DocumentationControllerTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testDocsRoute()
    {
        $processor = m::mock('\App\Processor\Documentation');
        $toc       = m::mock('\Kurenai\Document');
        $document  = m::mock('\Kurenai\Document');

        $document->shouldReceive('get')->once()->with('title')->andReturn('Documentation');

        $processor->shouldReceive('show')->once()
            ->andReturnUsing(function ($listener) use ($toc, $document) {
                return $listener->showSucceed('2.0', $toc, $document);
            })
            ->shouldReceive('parseMarkdown')->once()->with($toc, '2.0')->andReturn('toc')
            ->shouldReceive('parseMarkdown')->once()->with($document, '2.0')->andReturn('document');
        $this->app->instance('App\Processor\Documentation', $processor);

        Meta::shouldReceive('set')->once()->with('title', m::any())->andReturnNull();
        View::shouldReceive('make')->once()->with('documentation', m::type('Array'), [])->andReturn('documentation');

        $this->call('GET', 'docs/2.0/index');

        $this->assertResponseOk();
    }
}
