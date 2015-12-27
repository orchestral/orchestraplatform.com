---
title: Notifier Component

---

Notifier Component add a simplify approach to notifier the application user using mail (or other notification service) that is managed using `Orchestra\Notifier\NotifierManager`.

## Table of Content {#toc}

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)
* [Change Log]({doc-url}/components/notifier/changes#v2-1)
* [Github](https://github.com/orchestral/notifier)

## Version Compatibility {#compatibility}

Laravel    | Notifier
:----------|:----------
 4.1.x     | 2.1.x

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/notifier": "2.1.*"
		}
	}

And then run `composer install` from the terminal.

### Quick Installation {#quick-installation}

Above installation can also be simplify by using the following command:

	composer require "orchestra/notifier=2.1.*"


## Configuration {#configuration}

Next add the service provider in `app/config/app.php`

	'providers' => array(

		// ...

		'Orchestra\Notifier\NotifierServiceProvider',
	),

### Aliases

You might want to add `Orchestra\Support\Facades\Notifier` to class aliases in `app/config/app.php`:

	'aliases' => array(

		// ...

		'Orchestra\Notifier' => 'Orchestra\Support\Facades\Notifier',
	),
