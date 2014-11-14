<?php namespace App\Http\Controllers;

use Orchestra\Routing\Controller;
use Orchestra\Support\Traits\ControllerResponseTrait;

abstract class BaseController extends Controller
{
    use ControllerResponseTrait;

    /**
     * Processor instance.
     *
     * @var \App\Processor\Processor
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
