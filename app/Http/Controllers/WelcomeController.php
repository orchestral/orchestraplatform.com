<?php namespace App\Http\Controllers;

use Orchestra\Routing\Controller;

class WelcomeController extends Controller
{
    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('hello');
    }
}
