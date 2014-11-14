<?php

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

Foundation::group('app', '/', function ($router) {
    $router->get('/', 'HomeController@index');

    $router->get('docs/{version}', 'DocumentationController@index')
        ->where('version', '([a-zA-Z0-9\.]+)');

    $router->get('docs/{version}/{filename}', 'DocumentationController@show')
        ->where(['version' => '([a-zA-Z0-9\.]+)', 'filename' => '(.+)?']);

    $router->get('blogs', function () {
        return Redirect::to(handles('orchestra/story'));
    });

    $router->get('blogs/{any}', function ($any) {
        return Redirect::to(handles("orchestra/story::{$any}"));
    })->where('any', '(.*)');
});
