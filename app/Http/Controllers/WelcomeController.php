<?php namespace App\Http\Controllers;

use Orchestra\Routing\Controller;
use Illuminate\Support\Collection;

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
     * @return Response
     */
    public function index()
    {
        $name = app('orchestra.app')->installed() ? 'welcome' : 'hello';
        $data['packages'] = $packages = new Collection(config('project.packages', []));
        $data['components'] = $packages->filter(function ($package) {
            return (in_array('component', $package['type']));
        });

        return view($name, $data);
    }
}
