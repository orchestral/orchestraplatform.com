---
title: Asset Component
badge: asset

---

Asset Component is a port of Laravel 3 Asset for Orchestra Platform. The component main functionality is to allow asset declaration to be handle dynamically and asset dependencies can be resolve directly from the container. It however is not intended to becoma an asset pipeline package for Laravel, for such purpose we would recommend to use Grunt or Gulp.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
  - [Registering Assets](#registering-assets)
  - [Dumping Assets](#dumping-assets)
  - [Asset Dependencies](#asset-dependencies)
  - [Asset Containers](#asset-containers)
  - [Asset Versioning](#asset-versioning)
5. [Change Log]({doc-url}/components/asset/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

Laravel    | Asset
:----------|:----------
 4.0.x     | 2.0.x
 4.1.x     | 2.1.x
 4.2.x     | 2.2.x
 5.0.x     | 3.0.x

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/asset": "~3.0"
	}
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/asset=~3.0"

<a name="configuration"></a>
## Configuration

Next add the service provider in `config/app.php`.

```php
'providers' => [

	// ...

	'Orchestra\Asset\AssetServiceProvider',
],
```

### Aliases

You might want to add `Orchestra\Support\Facades\Asset` to class aliases in `config/app.php`:

```php
'aliases' => [

	// ...

	'Asset' => 'Orchestra\Support\Facades\Asset',
],
```

<a name="usage"></a>
## Usage

1. [Registering Assets](#registering-assets)
2. [Dumping Assets](#dumping-assets)
3. [Asset Dependencies](#asset-dependencies)
4. [Asset Containers](#asset-containers)
5. [Asset Versioning](#asset-versioning)

<a name="registering-assets"></a>
### Registering Assets

The Asset class provides a simple way to manage the CSS and JavaScript used by your application. To register an asset just call the add method on the Asset class:

#### Registering an asset:

```php
Asset::add('jquery', 'js/jquery.js');
```

The add method accepts three parameters. The first is the name of the asset, the second is the path to the asset relative to the public directory, and the third is a list of asset dependencies (more on that later). Notice that we did not tell the method if we were registering JavaScript or CSS. The add method will use the file extension to determine the type of file we are registering.

<a name="dumping-assets"></a>
### Dumping Assets

When you are ready to place the links to the registered assets on your view, you may use the styles or scripts methods:

Dumping assets into a view:

```html
<head>
	{!! Asset::styles() !!}
	{!! Asset::scripts() !!}
</head>
```

Above code can also be simplified as:

```html
<head>
	{!! Asset::show() !!}
</head>
```

<a name="asset-dependencies"></a>
### Asset Dependencies

Sometimes you may need to specify that an asset has dependencies. This means that the asset requires other assets to be declared in your view before it can be declared. Managing asset dependencies couldn't be easier in Laravel. Remember the "names" you gave to your assets? You can pass them as the third parameter to the add method to declare dependencies:

Registering a bundle that has dependencies:

```php
Asset::add('jquery-ui', 'js/jquery-ui.js', 'jquery');
```

In this example, we are registering the jquery-ui asset, as well as specifying that it is dependent on the jquery asset. Now, when you place the asset links on your views, the jQuery asset will always be declared before the jQuery UI asset. Need to declare more than one dependency? No problem:

Registering an asset that has multiple dependencies:

```php
Asset::add('jquery-ui', 'js/jquery-ui.js', ['first', 'second']);
```

<a name="asset-containers"></a>
### Asset Containers

To increase response time, it is common to place JavaScript at the bottom of HTML documents. But, what if you also need to place some assets in the head of your document? No problem. The asset class provides a simple way to manage asset containers. Simply call the container method on the Asset class and mention the container name. Once you have a container instance, you are free to add any assets you wish to the container using the same syntax you are used to:

Retrieving an instance of an asset container:

```php
Asset::container('footer')->add('example', 'js/example.js');
```

Dumping that assets from a given container:

```php
{!! Asset::container('footer')->scripts() !!}
```

<a name="asset-versioning"></a>
### Asset Versioning

Another option to increase response time is by utilizing browser caching, while there few ways to do this we pick last modified time as our way to version the Asset.

```php
Asset::container()->addVersioning();

// or alternatively
Asset::addVersioning();
```

> Note: this would only work with local asset.

You can remove adding versioning number by using:

```php
Asset::container()->removeVersioning();

// or alternatively
Asset::removeVersioning();
```
