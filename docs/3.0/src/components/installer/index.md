---
title: Installer Component
badge: installer

---

Orchestra Platform Installer Extension provide a generic installation wizard and should be enough for most generic usage. However if you find the need to have something more customize feel free to override this extension with something else.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Change Log]({doc-url}/components/installer/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

This extension is developed specifically for Orchestra Platform.

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "orchestra/installer": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/installer=~3.0"

<a name="configuration"></a>
## Configuration

Add `Orchestra\Installation\InstallerServiceProvider` service provider in `resources/config/app.php`.

```php
'providers' => [

    // ...

    'Orchestra\Installation\InstallerServiceProvider',
],
```
