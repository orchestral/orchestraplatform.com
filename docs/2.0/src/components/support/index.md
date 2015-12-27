---
title: Support Component

---

`Orchestra\Support` is basically a basic set of class required by Orchestra Platform. The idea behind it is similar to what is `Illuminate\Support` to Laravel 4 Framework.

* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/support": "2.0.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Support\MessagesServiceProvider',
	),

## Resources {#resources}

* [Manager Class](/docs/2.0/components/support/manager)
* [Messages Class](/docs/2.0/components/support/messages)
* [String Class](/docs/2.0/components/support/str)
* [Validation Class](/docs/2.0/components/support/validator)
* [Change Log](/docs/2.0/components/support/changes#v2-0)
