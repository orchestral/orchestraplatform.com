<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->get('/', 'WelcomeController@index');

$router->get('docs/{version}', 'DocumentationController@index')
    ->where('version', '([a-zA-Z0-9\.]+)');

$router->get('docs/{version}/{filename}', 'DocumentationController@show')
    ->where(['version' => '([a-zA-Z0-9\.]+)', 'filename' => '(.+)?']);

$router->get('blogs', function () {
    return redirect(handles('orchestra/story::/'));
});

$router->get('blogs/{any}', function ($any) {
    return redirect(handles("orchestra/story::{$any}"));
})->where('any', '(.*)');
