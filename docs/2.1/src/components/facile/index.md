---
title: Facile Component

---

Facile Component simplify the need to create API based response in your Laravel 4 application, with just the following code you are able to return multi format Response, either it be HTML (using `View`), json or etc.

## Table of Content {#toc}

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Change Log]({doc-url}/components/facile/changes#v2-1)
* [Github](https://github.com/orchestral/facile)

## Version Compatibility {#compatibility}

Laravel    | Facile
:----------|:----------
 4.0.x     | 2.0.x
 4.1.x     | 2.1.x

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/facile": "2.1.*"
		}
	}

And then run `composer install` from the terminal.

### Quick Installation {#quick-installation}

Above installation can also be simplify by using the following command:

	composer require "orchestra/facile=2.1.*"

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Facile\FacileServiceProvider',
	),

### Aliases

You might want to add `Orchestra\Support\Facades\Facile` to class aliases in `app/config/app.php`:

	'aliases' => array(

		// ...

		'Facile' => 'Orchestra\Support\Facades\Facile',
	),

