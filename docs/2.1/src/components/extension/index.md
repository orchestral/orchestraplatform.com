---
title: Extension Component

---

Extension Component allows components or packages to be added dynamically to Orchestra Platform without the hassle of modifying the configuration.

## Table of Content {#toc}

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Further Reading]({doc-url}/components/extension/usage)
  - [Usage]({doc-url}/components/extension/usage)
  - [Extending Extension]({doc-url}/components/extension/extend)
* [Change Log]({doc-url}/components/extension/changes#v2-1)
* [Github](https://github.com/orchestral/extension)

## Version Compatibility {#compatibility}

Laravel    | Extension
:----------|:----------
 4.0.x     | 2.0.x
 4.1.x     | 2.1.x

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/extension": "2.1.*"
		}
	}

And then run `composer install` from the terminal.

### Quick Installation {#quick-installation}

Above installation can also be simplify by using the following command:

	composer require "orchestra/extension=2.1.*"

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Extension\ExtensionServiceProvider',
		'Orchestra\Memory\MemoryServiceProvider',
		'Orchestra\Extension\PublisherServiceProvider',

		'Orchestra\Extension\CommandServiceProvider',
	),

### Aliases

You might want to add `Orchestra\Support\Facades\Extension` to class aliases in `app/config/app.php`:

	'aliases' => array(

		// ...

		'Orchestra\Extension' => 'Orchestra\Support\Facades\Extension',
	),

### Migrations

Before we can start using `Orchestra\Extension`, please run the following:

	php artisan extension:migrate

> The command utility is enabled via `Orchestra\Extension\CommandServiceProvider`.


