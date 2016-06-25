<?php

use Illuminate\Routing\Router;

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

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
*/

$router->group(['middleware' => ['web']], function (Router $router) {
    $router->get('home', 'HomeController@index');
});
