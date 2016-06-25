---
title: Using Extension
---

An extension is a basically a package or module (package with routes) except that first it need to have a manifest file as similar as you would have `composer.json` for every package.

1. [Managing an Extension](#managing-an-extension)
2. [Basic of an Extension](#basic-of-an-extension)
  * [Manifest File](#manifest-file)
3. [Configuring an Extension](#configuring-an-extension)
  * [Service Providers for Extension](#service-providers-for-extension)
    - [Autoloading Files](#autoloading-files)
  * [Handling a Route](#handling-a-route)
  * [Disabling Configuration](#disabling-configuration)
4. [Adding Extension Location](#add-extension-location)

<a name="managing-an-extension"></a>
## Managing an Extension

Extensions will be manage by Orchestra Platform Administrator Interface. Login as an administrator and go to **Extensions** on the top navigation.

Few things to consider:

* Only activated extensions will be run on runtime.
* Orchestra Platform will start all service providers listed by the extension.

<a name="basic-of-an-extension"></a>
## Basic of an Extension

<a name="manifest-file"></a>
### Manifest File

The manifest file will be stored in `{package-name}/orchestra.json` (same level as `composer.json`), this tell Orchestra Platform to handle the package as an extension.

```json
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
```

<a name="configuring-an-extension"></a>
## Configuring an Extension

By default, administrator are able to configure any extension based on requirement of the application including `handles` value using Orchestra Platform Administrator Interface. This allow non-technical administrator to take charge of the application without having to understand any of the code.

To configure an extension, the extension need to be activated. Once this is done, all extension that allow configuration can be configured. Simply click on the extension name to navigate to the configuration page.

<a name="service-providers-for-extension"></a>
### Service Providers for Extension

Manifest file also allow extension to dynamically register service providers without having to change `config/app.php`. To tell Orchestra Platform to automatically run your service provider, include the following:

```json
	"provides": [
		"Robotix\\RobotixServiceProvider"
	]
```

> You can add multiple service provider on a single extension, it also will respect if the service provider is deferred.

<a name="autoloading-files"></a>
### Autoloading Files

Apart from service providers, you can also set pre-define PHP file to be loaded when the extension is booted. These start files allows extension to any booting script required for the extension to work (as Laravel run application start.php file).

```json
	"autoload": [
		"start.php"
	]
```

In the above example, `{package-name}/start.php` will be loaded.

> What inside the file depends on how extension would interact with Orchestra Platform and this can be diverse depending on use cases.

#### Default Start File

Other than specifying the autoload file, Extension would also load the default start file will be stored in `{package-name}/src/orchestra.php` or `{package-name}/orchestra.php`.

<a name="handling-a-route"></a>
### Handling a Route

Unliked basic packages for Laravel, end users doesn't have control to manage packages routing as compared to Orchestra Platform, any extension that offer routing would only need to identify a default route option by adding:

```json
	"config": {
		"handles": "robotix"
	}
```

<a name="disabling-configuration"></a>
### Disabling Configuration

Extension developers can disable configuration option by adding `"configurable" : false`, To do this edit your manifest file.

```json
	"config": {
		"configurable": false
	}
```

> By doing so, Orchestra Platform will take extension as it is and will not try to modify any of the configuration.

<a name="add-extension-location"></a>
## Adding Extension Location

By default, Extension component is configured to search for extension under the following folders using `glob()` PHP function:

* `app`
* `app/Extensions/*/*`
* `vendor/*/*`

If there a requirement to add non-distributed packages feel free to include your own structure, and include the path in `App\Providers\ExtensionServiceProvider`.

> Be sure to add modules autoloading structure to `app`'s `composer.json`.
