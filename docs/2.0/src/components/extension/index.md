---
title: Extension Component

---

`Orchestra\Extension` allows components or packages to be added dynamically to Orchestra Platform without the hassle of modifying the configuration.

* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/extension": "2.0.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Extension\ExtensionServiceProvider',
		'Orchestra\Memory\MemoryServiceProvider',
		'Orchestra\Extension\PublisherServiceProvider',

		'Orchestra\Extension\CommandServiceProvider',
	),

### Migrations

Before we can start using `Orchestra\Extension`, please run the following:

	php artisan orchestra:extension install

> The command utility is enabled via `Orchestra\Extension\CommandServiceProvider`.

## Resources {#resources}

* [Usage](/docs/2.0/components/extension/usage)
* [Extend](/docs/2.0/components/extension/extend)
* [Change Log](/docs/2.0/components/extension/changes#v2-0)
