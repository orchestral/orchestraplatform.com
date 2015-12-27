---
title: View Component

---

`Orchestra\View` is Orchestra Platform approach to deliver themeable application that support extensions. The functionality evolves by modifying how `Illuminate\View\ViewFileFinder` would resolve which file, which would first look into the current active theme folder, before resolving it cascading-ly.

This would allow extension (or even packages) to have it's own set of view styling while developer can maintain a standardise overall design through out the project using a theme.

* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/view": "2.2.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\View\DecoratorServiceProvider',
		'Orchestra\View\ViewServiceProvider',
		'Orchestra\Memory\MemoryServiceProvider',
	),

## Resources {#resources}

* [Usage]({doc-url}/components/view/usage)
* [Change Log]({doc-url}/components/view/changes#v2-2)
