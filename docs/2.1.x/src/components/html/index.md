---
title: HTML Component

---

`Orchestra\Html` extends the functionality of `Illuminate\Html` with the extra functionality to including a chainable Form and Table builder. These set of functionality are the backbone in allowing extensions in Orchestra Platform to attach action to any existing form or table.

* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/html": "2.1.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...
		# Remove 'Illuminate\Html\HtmlServiceProvider'
		# and add 'Orchestra\Html\HtmlServiceProvider'

		'Orchestra\Html\HtmlServiceProvider',
	),

> `Orchestra\Html\HtmlServiceProvider` should replace `Illuminate\Html\HtmlServiceProvider`.

## Resources {#resources}

* [Usage]({doc-url}/components/html/usage)
* [Change Log]({doc-url}/components/html/changes#v2-1)
