<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Show the application welcome screen to the user.
     *
     * @return mixed
     */
    public function index()
    {
        $name       = app('orchestra.app')->installed() ? 'welcome' : 'hello';
        $packages   = collect(config('website.packages', []));
        $components = $packages->filter(function ($package) {
            return (in_array('component', $package['type']));
        });

        return view($name, compact('packages', 'components'));
    }

    /**
     * Show pricing or plan page.
     *
     * @return mixed
     */
    public function plan()
    {
        return view('plan');
    }
}
