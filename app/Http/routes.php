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
