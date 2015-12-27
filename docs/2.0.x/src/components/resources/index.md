---
title: Resources Component

---

`Orchestra\Resources` is an adhoc routing manager that allow extension developer to add CRUD interface without touching Orchestra Platform.

* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/resources": "2.0.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Resources\ResourcesServiceProvider',
	),

## Resources {#resources}

* [Usage](/docs/2.0/components/resources/usage)
* [Change Log](/docs/2.0/components/resources/changes#v2-0)
