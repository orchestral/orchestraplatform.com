<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

App::register('Illuminate\Foundation\Providers\CommandCreatorServiceProvider');
App::register('Illuminate\Foundation\Providers\ComposerServiceProvider');
App::register('Illuminate\Foundation\Providers\KeyGeneratorServiceProvider');
App::register('Illuminate\Foundation\Providers\MaintenanceServiceProvider');
App::register('Illuminate\Foundation\Providers\OptimizeServiceProvider');
App::register('Illuminate\Foundation\Providers\RouteListServiceProvider');
App::register('Illuminate\Foundation\Providers\ServerServiceProvider');
App::register('Illuminate\Foundation\Providers\TinkerServiceProvider');

App::register('Orchestra\Optimize\OptimizeServiceProvider');
App::register('Orchestra\Debug\CommandServiceProvider');
