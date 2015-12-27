---
title: Artisan Debug Profiler

---

`Orchestra\Debug` is commandline profiling package for Laravel 4, It was based from Laravel 4.1 commandline profiling tool which was merged with `php artisan tail`.

* [Installation](#installation)
* [Configuration](#configuration)
* [Enabling Profiler](#enabling-profiler)
* [Resources](#resources)

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/debug": "2.0.*"
		}
	}

## Configuration {#configuration}

Next add the following service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Debug\DebugServiceProvider',

		'Orchestra\Debug\CommandServiceProvider',
	),

You could also create an alias for `Orchestra\Debug\Facades\Profiler` in `app/config/app.php`.

	'alias' => array(
		'Profiler' => 'Orchestra\Debug\Facades\Profiler',
	),

## Enabling Profiler {#enabling-profiler}

To enable the profiler, all you need to do is:

	Profiler::attachDebugger();

> This normally would goes in your development environment such as `local` environment, in the case `app/start/local.php` would be an ideal location to include the command.

### Viewing the Profiler

To view the profiler, run the following command in your terminal:

	php artisan debug

# Resources

* [Change Log](/docs/2.0/components/debug/changes#v2-0)
