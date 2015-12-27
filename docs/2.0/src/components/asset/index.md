---
title: Asset Component

---

`Orchestra\Asset` is a port of Laravel 3 Asset for Orchestra Platform.

* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/asset": "2.0.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Asset\AssetServiceProvider',
	),

### Aliases

You might want to add `Orchestra\Support\Facades\Asset` to class aliases in `app/config/app.php`:

	'aliases' => array(

		// ...

		'Orchestra\Asset' => 'Orchestra\Support\Facades\Asset',
	),

## Resources {#resources}

* [Usage](/docs/2.0/components/asset/usage)
* [Change Log](/docs/2.0/components/asset/changes#v2-0)
* [Github](https://github.com/orchestral/asset)
