---
title: Using Extension
---

An extension is a basically a package except that first it need to have a manifest file as similar as you would have `composer.json` for every package.

* [Managing an Extension](#managing-an-extension)
* [Basic of an Extension](#basic-of-an-extension)
  * [Manifest File](#manifest-file)
* [Configuring an Extension](#configuring-an-extension)
  * [Service Providers for Extension](#service-providers-for-extension)
    - [Autoloading Files](#autoloading-files)
  * [Handling a Route](#handling-a-route)
  * [Disabling Configuration](#disabling-configuration)

## Managing an Extension {#managing-an-extension}

Extensions will be manage by Orchestra Platform Administrator Interface. Login as an administrator and go to **Extensions** on the top navigation.

Few things to consider:

* Only activated extensions will be run on runtime.
* Orchestra Platform will start all service providers listed by the extension.

## Basic of an Extension {#basic-of-an-extension}

### Manifest File {#manifest-file}

The manifest file will be stored in `{package-name}/orchestra.json` (same level as `composer.json`), this tell Orchestra Platform to handle the package as an extension.

	{
		"name": "Robotix",
		"description": "Robots.txt",
		"author": "Mior Muhammad Zaki",
		"url": "https://github.com/crynobone/robotix",
		"config": {
			"handles": "robotix"
		},
		"provide": [
			"Robotix\\RobotixServiceProvider"
		],
		"autoload": [
			"start.php"
		]
	}

## Configuring an Extension {#configuring-an-extension}

By default, administrator are able to configure any extension based on requirement of the application including `handles` value using Orchestra Platform Administrator Interface. This allow non-technical administrator to take charge of the application without having to understand any of the code.

To configure an extension, the extension need to be activated. Once this is done, all extension that allow configuration can be configured. Simply click on the extension name to navigate to the configuration page.

### Service Providers for Extension {#service-providers-for-extension}

Manifest file also allow extension to dynamically register service providers without having to change `app/config/app.php`. To tell Orchestra Platform to automatically run your service provider include the following:

	{
		"provide": [
			"Robotix\\RobotixServiceProvider"
		]
	}

> You can add multiple service provider on a single extension but do avoid using `$this->app->booting()` inside the service providers as this would be ignored.

### Autoloading Files {#autoloading-files}

Apart from service providers, you can also set pre-define PHP file to be loaded when the extension is booted. These start files allows extension to any booting script required for the extension to work (as Laravel run application start.php file).

	{
		"autoload": [
			"start.php"
		]
	}

In the above example, `{package-name}/src/start.php` will be loaded.

> What inside the file depends on how extension would interact with Orchestra Platform and this can be diverse depending on use cases.

#### Default Start File

Other than specifying the autoload file, Extension would also load the default start file will be stored in `{package-name}/src/orchestra.php`.

### Handling a Route {#handling-a-route}

Unliked basic packages for Laravel 4, end users doesn't have control to manage packages routing as compared to Orchestra Platform, any extension that offer routing would only need to identify a default route option by adding:

	{
		"config": {
			"handles": "robotix"
		}
	}

### Disabling Configuration {#disabling-configuration}

Extension developers can disable configuration option by adding `"configurable" : false`, To do this edit your manifest file.

	{
		"config": {
			"configurable": false
		}
	}

> By doing so, Orchestra Platform will take extension as it is and will not try to modify any of the configuration.
