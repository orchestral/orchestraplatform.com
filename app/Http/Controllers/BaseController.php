<?php namespace App\Http\Controllers;

abstract class BaseController extends Controller
{
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
