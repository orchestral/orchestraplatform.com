---
title: Translation Component
badge: translation

---

Translation Component extends the functionality of `Illuminate\Translation` to add support for cascading filesystem replacement for Laravel 4 packages.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
5. [Change Log]({doc-url}/components/translation/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

Laravel    | Translation
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
        "orchestra/translation": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/translation=~3.0"

<a name="configuration"></a>
## Configuration

Next add the service provider in `config/app.php`.

```php
'providers' => [

    // ...
    # Remove 'Illuminate\Translation\TranslationServiceProvider'
    # and add 'Orchestra\Translation\TranslationServiceProvider'

    'Orchestra\Translation\TranslationServiceProvider',
],
```

> `Orchestra\Translation\TranslationServiceProvider` should replace `Illuminate\Translation\TranslationServiceProvider`.

<a name="usage"></a>
## Usage

Translation Component make it easier to have redistribute packages language files, instead of relying on `resources/lang/en/package/name/title.php` you can now publish it under `resources/lang/package/name/en/title.php` making it easier to create repository (and publish it under [GitHub](https://github.com)) for a single packages or extension to handle multiple languages.
