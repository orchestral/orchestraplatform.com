---
title: Facile Component

---

`Orchestra\Facile` simplify the need to create API based response in your Laravel 4 application, with just the following code you are able to return multi format Response, either it be HTML (using `View`), json or etc.

* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/facile": "2.0.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Facile\FacileServiceProvider',
	),

You might want to add `Orchestra\Support\Facades\Facile` to class aliases in `app/config/app.php`:

	'aliases' => array(

		// ...

		'Facile' => 'Orchestra\Support\Facades\Facile',
	),

## Resources {#resources}

* [Template](/docs/2.0/components/facile/templating)
* [Change Log](/docs/2.0/components/facile/changes#v2-0)
