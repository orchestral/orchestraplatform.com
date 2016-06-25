---
title: Extension Component
badge: extension

---

Extension Component allows components or packages to be added dynamically to Orchestra Platform without the hassle of modifying the configuration.

## Table of Content {#toc}

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage]({doc-url}/components/extension/usage)
5. [Change Log]({doc-url}/components/extension/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

Laravel    | Extension
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
        "orchestra/extension": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/extension=~3.0"

<a name="configuration"></a>
## Configuration

Next add the service provider in `config/app.php`.

```php
'providers' => [

    // ...

    'Orchestra\Extension\ExtensionServiceProvider',
    'Orchestra\Memory\MemoryServiceProvider',
    'Orchestra\Extension\PublisherServiceProvider',

    'Orchestra\Extension\CommandServiceProvider',
],
```

### Aliases

You might want to add `Orchestra\Support\Facades\Extension` to class aliases in `config/app.php`:

```php
'aliases' => [

    // ...

    'Extension' => 'Orchestra\Support\Facades\Extension',
],
```

### Migrations

Before we can start using Extension component, please run the following:

    php artisan extension:migrate

> The command utility is enabled via `Orchestra\Extension\CommandServiceProvider`.
