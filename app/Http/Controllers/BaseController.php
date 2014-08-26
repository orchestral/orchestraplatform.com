<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Orchestra\Support\Traits\ControllerResponseTrait;

abstract class BaseController extends Controller
{
    use ControllerResponseTrait;

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
