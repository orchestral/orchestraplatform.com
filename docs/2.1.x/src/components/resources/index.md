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
			"orchestra/resources": "2.1.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Resources\ResourcesServiceProvider',
	),

## Resources {#resources}

* [Usage]({doc-url}/components/resources/usage)
* [Change Log]({doc-url}/components/resources/changes#v2-1)
