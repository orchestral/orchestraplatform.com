<?php namespace Platform\Routing;

use Illuminate\Routing\Controller;

abstract class BaseController extends Controller
{
    /**
     * Processor instance.
     *
     * @var \Platform\Processor\AbstractableProcessor
     */
    protected $processor;

    /**
     * Setup a new controller.
     */
    public function __construct()
    {
        $this->setupFilters();
    }

    /**
     * Define controller filters.
     *
     * @return void
     */
    abstract protected function setupFilters();
}
