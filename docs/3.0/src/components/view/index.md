---
title: View Component
badge: view

---

View component is Orchestra Platform approach to deliver themeable application that support extensions. The functionality evolves by modifying how `Illuminate\View\ViewFileFinder` would resolve which file, which would first look into the current active theme folder, before resolving it cascading-ly.

This would allow extension (or even packages) to have it's own set of view styling while developer can maintain a standardise overall design through out the project using a theme.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
5. [Change Log]({doc-url}/components/view/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

 Laravel  | View
:---------|:----------
 4.0.x    | 2.0.x
 4.1.x    | 2.1.x
 4.2.x    | 2.2.x
 5.0.x    | 3.0.x

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "orchestra/view": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/view=~3.0"

<a name="configuration"></a>
## Configuration

Next add the service provider in `config/app.php`.

```php
'providers' => [

    // ...

    'Orchestra\View\DecoratorServiceProvider',
    'Orchestra\View\ViewServiceProvider',
    'Orchestra\Memory\MemoryServiceProvider',
],
```

<a name="usage"></a>
## Usage

1. [Basic of a Theme](#basic-of-a-theme)
2. [Anatomy of a Theme](#anatomy-of-a-theme)
3. [Asset Routing](#asset-routing)

<a name="basic-of-a-theme"></a>
## Basic of a Theme

### Default Theme

By default, the selected theme is `default`, and located at `public/themes/default`.

> You might need to create the following folder when `Theme` is used outside of Orchestra Platform.

### Manifest File

Each theme can have a manifest file, which provide Orchestra Platform the required information to properly use the theme.

```json
{
  "name": "Default",
  "description": "Default Theme for Orchestra Platform",
  "author": "Orchestra Platform",
  "autoload": [
  ]
}
```

#### Autoloading Theme Configuration

There would be time where you would need to be able to customize Theme by adding additional helper or configuration. We can easily start files using the `"autoload"` options:

```json
{
  "autoload": [
    "start.php",
    "helpers.php"
  ]
}
```

Based on above example, two files would be loaded on each request:

* `public/themes/default/start.php`
* `public/themes/default/helpers.php`

<a name="anatomy-of-a-theme"></a>
## Anatomy of a Theme

The **application** views is accessible from the root path of your theme, while extensions/packages can be accessible from `packages/{package-name}` subfolder. So for example if your selected theme is `default`, and you plan to replace `home.index` and `acme/foo::home.index` view. Only the following file would be needed:

* `public/themes/default/home/index.blade.php`
* `public/themes/default/packages/acme/foo/home/index.blade.php`
* `public/themes/default/theme.json`
* `public/themes/default/screenshot.png`

> As you can see, the file structure of the view follow closely cascading filesystem replacement structure used in many other framework.

<a name="asset-routing"></a>
## Asset Routing

You are free to maintain where assets is located inside the theme folder as it is under public folder. To access the asset file, you can use the following snippet.

```html
<script src="{{ Theme::to('assets/js/script.js') }}">
<!-- this would point to `http:://yourdomain.com/themes/default/assets/js/script.js` -->
```

Alternatively you can also use `Theme::asset()`:

```html
<script src="{{ Theme::asset('assets/js/script.js') }}">
<!-- this would point to `/themes/default/assets/js/script.js` -->
```
