<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('docs/{version}/{filename?}', 'Platform\Routing\DocumentationController@show')
    ->where('filename', '(.*)');

Route::get('/', function () {
    return View::make('hello');
});

/*
|--------------------------------------------------------------------------
| Handle 404 and errors
|--------------------------------------------------------------------------
*/

App::missing(function () {
    return Response::view('404', [], 404);
});

App::error(function (ModelNotFoundException $e) {
    return Response::view('404', [], 404);
});
