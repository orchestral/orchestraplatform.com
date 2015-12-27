---
title: Widget Component

---

Widget allow you to manage widgetize actions in Orchestra Platform. By default Orchestra Platform provides the following widgets:

* [Type of Widgets](#type)
* [Installation](#installation)
* [Configuration](#configuration)
* [Resources](#resources)

## Type of Widgets

* **Menu** to manage menu.
* **Pane** to manage dashboard items.
* **Placeholder** to manage sidebar widgets.

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/widget": "2.0.*"
		}
	}

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...

		'Orchestra\Widget\WidgetServiceProvider',
	),

## Resources {#resources}

* [Change Log](/docs/2.0/components/widget/changes#v2-0)
