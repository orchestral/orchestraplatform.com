---
title: Artisan Debug Profiler

---

Debug Component is commandline profiling package for Laravel 4, It was based from Laravel 4.1 commandline profiling tool which was merged with `php artisan tail`.

## Table of Content {#toc}

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Change Log]({doc-url}/components/debug/changes#v2-1)
* [Github](https://github.com/orchestral/debug)

## Version Compatibility {#compatibility}

Laravel    | Debug
:----------|:----------
 4.0.x     | 2.0.x
 4.1.x     | 2.1.x

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/debug": "2.1.*"
		}
	}

And then run `composer install` from the terminal.

### Quick Installation {#quick-installation}

Above installation can also be simplify by using the following command:

	composer require "orchestra/debug=2.1.*"

## Configuration {#configuration}

Next add the following service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Debug\DebugServiceProvider',

		'Orchestra\Debug\CommandServiceProvider',
	),

### Aliases

You could also create an alias for `Orchestra\Support\Facades\Profiler` in `app/config/app.php`.

	'alias' => array(
		'Orchestra\Profiler' => 'Orchestra\Support\Facades\Profiler',
	),

## Usage {#usage}

### Enabling Profiler {#enabling-profiler}

To enable the profiler, all you need to do is:

	Orchestra\Profiler::attachDebugger();

> This normally would goes in your development environment such as `local` environment, in the case `app/start/local.php` would be an ideal location to include the command.

### Viewing the Profiler

To view the profiler, run the following command in your terminal:

	php artisan debug
