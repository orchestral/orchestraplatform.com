---
title: Orchestra Testbench Package
badge: testbench

---

Testbench Component is a simple package that is supposed to help you write tests for your Laravel package, especially when there is routing involved.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Usage](#usage)
    - [Custom Service Providers](#package-providers)
    - [Custom Aliases](#package-aliases)
    - [Overriding setup() method](#overriding-setup-method)
    - [Overriding Console Kernel](#overriding-console-kernel)
    - [Overriding HTTP Kernel](#overriding-http-kernel)
    - [Overriding Application Timezone](#overriding-application-timezone)
    - [Using Migrations](#using-migrations)
4. [Alternative 3rd Party Testing](#alternative-testing)
5. [Troubleshoot](#troubleshoot)
6. [Change Log]({doc-url}/components/testbench/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

 Laravel  | Testbench
:---------|:----------
 4.0.x    | 2.0.x
 4.1.x    | 2.1.x
 4.2.x    | 2.2.x
 5.0.x    | 3.0.x

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require-dev": {
        "orchestra/testbench": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require --dev "orchestra/testbench=~3.0"

<a name="usage"></a>
## Usage

To use Testbench Component, all you need to do is extend `Orchestra\Testbench\TestCase` instead of `PHPUnit_Framework_TestCase`. The fixture `app` booted by `Orchestra\Testbench\TestCase` is predefined to follow the base application skeleton of Laravel 5.

```php
<?php

class TestCase extends Orchestra\Testbench\TestCase
{
    //
}
```

<a name="package-providers"></a>
### Custom Service Providers

To load your package service provider, override the `getPackageProviders`.

```php
protected function getPackageProviders($app)
{
    return ['Acme\AcmeServiceProvider'];
}
```

<a name="package-aliases"></a>
### Custom Aliases

To load your package alias, override the `getPackageAliases`.

```php
protected function getPackageAliases($app)
{
    return [
        'Acme' => 'Acme\Facade'
    ];
}
```

<a name="overriding-setup-method"></a>
### Overriding setUp() method

Since `Orchestra\Testbench\TestCase` replace Laravel's `Illuminate\Foundation\Testing\TestCase`, if you need your own `setUp()` implementation, do not forget to call `parent::setUp()`:

```php
/**
 * Setup the test environment.
 */
public function setUp()
{
    parent::setUp();

    // Your code here
}
```

If you need to add something early in the application bootstrapping process, you could use the `getEnvironmentSetUp()` method:

```php
/**
 * Define environment setup.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return void
 */
protected function getEnvironmentSetUp($app)
{
    // Setup default database to use sqlite :memory:
    $app['config']->set('database.default', 'testbench');
    $app['config']->set('database.connections.testbench', [
        'driver'   => 'sqlite',
        'database' => ':memory:',
        'prefix'   => '',
    ]);
}
```

<a name="overriding-console-kernel"></a>
### Overriding Console Kernel

You can easily swap Console Kernel for application bootstrap by overriding `resolveApplicationConsoleKernel()` method:

```php
/**
 * Resolve application Console Kernel implementation.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return void
 */
protected function resolveApplicationConsoleKernel($app)
{
    $app->singleton('Illuminate\Contracts\Console\Kernel', 'Acme\Testbench\Console\Kernel');
}
```

<a name="overriding-http-kernel"></a>
### Overriding HTTP Kernel

You can easily swap HTTP Kernel for application bootstrap by overriding `resolveApplicationHttpKernel()` method:

```php
/**
 * Resolve application HTTP Kernel implementation.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return void
 */
protected function resolveApplicationHttpKernel($app)
{
    $app->singleton('Illuminate\Contracts\Http\Kernel', 'Acme\Testbench\Http\Kernel');
}
```

<a name="overriding-application-timezone"></a>
### Overriding Application Timezone

You can also easily override application default timezone, instead of the default `"UTC"`:

```php
/**
 * Get application timezone.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return string|null
 */
protected function getApplicationTimezone($app)
{
    return 'Asia/Kuala_Lumpur';
}
```

<a name="using-migrations"></a>
### Using Migrations

Testbench include a custom migrations command that support `realpath` option instead of the basic relative `path` option, this would make it easier for you to run database migrations during testing by just including the full realpath to your package database/migration folder.

```php
$this->artisan('migrate', [
    '--database' => 'testbench',
    '--realpath' => realpath(__DIR__.'/../migrations'),
]);
```

<a name="alternative-testing"></a>
## Alternative 3rd Party Testing

There also 3rd party packages that extends Testbench Component on CodeCeption and PHPSpec:

* [Testbench with CodeCeption](https://bitbucket.org/aedart/testing-laravel)
* [Testbench with PHPSpec](https://github.com/Pixelindustries/phpspec-testbench)

<a name="troubleshoot"></a>
## Troubleshoot

<a name="troubleshoot-invalid-key-length"></a>
### No supported encrypter found. The cipher and / or key length are invalid.

    RuntimeException: No supported encrypter found. The cipher and / or key length are invalid.

This error would only occur if your test suite require actual usage of the encrypter. To solve this you can add a dummy `APP_KEY` or use a specific key to your application/package `phpunit.xml`.

```xml
<phpunit>

    // ...

    <php>
        <env name="APP_KEY" value="AckfSECXIvnK5r28GVIWUAxmbBSjTsmF"/>
    </php>

</phpunit>
```
