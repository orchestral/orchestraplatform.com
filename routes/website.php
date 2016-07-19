<?php

use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a given Closure or controller and enjoy the fresh air.
|
*/

$router->get('/', 'WelcomeController@index');

$router->get('plan', 'WelcomeController@plan');

$router->get('docs/{version}', 'DocumentationController@index')
    ->where('version', '([a-zA-Z0-9\.]+)');

$router->get('docs/{version}/{filename}', 'DocumentationController@show')
    ->where(['version' => '([a-zA-Z0-9\.]+)', 'filename' => '(.+)?']);

$router->get('blogs', 'LegacyBlogController@index');

$router->get('blogs/{year}/{month}/{day}/{slug}', [
    'uses'  => 'LegacyBlogController@show',
    'where' => [
        'year'  => '\d{4}',
        'month' => '\d{1,2}',
        'day'   => '\d{1,2}',
        'slug'  => '(.*)',
    ],
]);
