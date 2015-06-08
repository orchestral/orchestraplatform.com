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
        $this->setupMiddleware();
    }

    /**
     * Define controller middleware.
     *
     * @return void
     */
    abstract protected function setupMiddleware();
}
