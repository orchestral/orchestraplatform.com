---
title: Multi-tenant Database Schema Manager for Laravel
badge: tenanti

---

Tenanti allow you to manage multi-tenant data schema and migration manager for your Laravel application.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
   - [Create a Driver](#create-a-driver)
   - [Setup Model Observer](#setup-model-observer)
   - [Console Support](#console-support)
   - [Multi Database Connection Setup](#multi-database-connection-setup)
5. [Change Log]({doc-url}/components/tenanti/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

Laravel  | Tenanti
:--------|:---------
 4.2.x   | 2.2.x
 5.0.x   | 3.0.x

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "orchestra/tenanti": "~3.0"
    }
}
```

And then run `composer install` to fetch the package.

<a name="quick-installation"></a>
### Quick Installation

You could also simplify the above code by using the following command:

    composer require "orchestra/tenanti=~3.0"

<a name="configuration"></a>
### Configuration

Next add the following service provider in `config/app.php`.

```php
'providers' => [

    // ...
    'Orchestra\Tenanti\TenantiServiceProvider',
    'Orchestra\Tenanti\CommandServiceProvider',
],
```

> The command utility is enabled via `Orchestra\Tenanti\CommandServiceProvider`.

<a name="usage"></a>
## Usage

1. [Create a Driver](#create-a-driver)
2. [Setup Model Observer](#setup-model-observer)
3. [Console Support](#console-support)
4. [Multi Database Connection Setup](#multi-database-connection-setup)

<a name="create-a-driver"></a>
### Create a Driver

Update your `App\Providers\ConfigServiceProvider` to include following options:

```php
<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
        config([
            'orchestra.tenanti.drivers.user' => [
                'model' => 'App\User',
                'path'  => database_path('tenanti/user'),
            ],
        ]);
    }
}
```

You can customize, or add new driver in the configuration. It is important to note that `model` configuration only work with `Eloquent` instance.

Alternatively, you could also use `php artisan vendor:publish` command to publish the configuration file to `config/orchestra/tenanti.php`.

#### Setup migration autoload

For each driver, you should also consider adding the migration path into autoload (if it not already defined). To do this you can edit your `composer.json`.

```json
{
    "autoload": {
        "classmap": [
            "database/tenant/users"
        ]
    }
}
```

<a name="setup-model-observer"></a>
### Setup Model Observer

Now that we have setup the configuration, let add an observer to our `User` class (preferly in `App\Providers\AppServiceProvider`):

```php
<?php namespace App\Providers;

use App\User;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        User::observe(new UserObserver);
    }
}
```

and your `App\Observers\UserObserver` class should consist of the following:

```php
<?php namespace App\Observers;

use Orchestra\Tenanti\Observer;

class UserObserver extends Observer
{
    public function getDriverName()
    {
        return 'user';
    }
}
```

<a name="console-support"></a>
## Console Support

Tenanti include additional command to help you run bulk migration when a new schema is created, the available command resemble the usage available from `php artisan migrate` namespace.

Command                                    | Description
:------------------------------------------|:---------------------
 php artisan tenanti:install {driver}      | Setup migration table on each entry for a given driver.
 php artisan tenanti:make {driver} {name}  | Make a new Schema generator for a given driver.
 php artisan tenanti:migrate {driver}      | Run migration on each entry for a given driver.
 php artisan tenanti:rollback {driver}     | Rollback migration on each entry for a given driver.
 php artisan tenanti:reset {driver}        | Reset migration on each entry for a given driver.
 php artisan tenanti:refresh {driver}      | Refresh migration (reset and migrate) on each entry for a given driver.

<a name="multi-database-connection-setup"></a>
## Multi Database Connection Setup

Instead of using Tenanti with a single database connection, you could also setup a database connection for each tenant.

### Configuration

By introducing a `migration` config, you can now setup the migration table name to be `tenant_migrations` instead of `user_{id}_migrations`.

```php
<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
        config([
            'orchestra.tenanti.drivers.user' => [
                'model'     => 'App\User',
                'migration' => 'tenant_migrations',
                'path'      => database_path('tenanti/user'),
            ],
        ]);
    }
}
```

### Observer

Adding an override method for `getConnectionName()` would allow you to force the migration to be executed on the desire connection.

```php
<?php namespace App\Observers;

use Orchestra\Tenanti\Observer;

class UserObserver extends Observer
{
    public function getDriverName()
    {
        return 'user';
    }

    public function getConnectionName()
    {
        return 'tenant_{id}';
    }
}
```
