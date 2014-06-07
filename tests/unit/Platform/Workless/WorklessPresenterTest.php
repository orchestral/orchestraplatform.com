<?php namespace TestCase\Platform\Workless;

use Mockery as m;
use Platform\Workless\WorklessPresenter;

class WorklessPresenterTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    protected function getPaginator()
    {
        return m::mock('\Illuminate\Pagination\Paginator')
            ->shouldReceive('getLastPage')->once()->andReturn(5)
            ->shouldReceive('getCurrentPage')->once()->andReturn(3)
            ->getMock();
    }

    public function testGetPageLinkWrapperMethod()
    {
        $paginator = $this->getPaginator();

        $stub = new WorklessPresenter($paginator);
        $page = $stub->getPageLinkWrapper('acme', 4);

        $this->assertEquals('<a href="acme" class="page-numbers">4</a>', $page);
    }

    public function testGetDisabledTextWrapperMethod()
    {
        $paginator = $this->getPaginator();

        $stub = new WorklessPresenter($paginator);
        $page = $stub->getDisabledTextWrapper(4);

        $this->assertEquals('<span class="page-numbers">4</span>', $page);
    }

    public function testGetActivePageWrapperMethod()
    {
        $paginator = $this->getPaginator();

        $stub = new WorklessPresenter($paginator);
        $page = $stub->getActivePageWrapper(4);

        $this->assertEquals('<span class="page-numbers current">4</span>', $page);
    }
}
