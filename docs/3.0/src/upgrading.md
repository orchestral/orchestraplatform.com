---
title: Upgrade Guide

---

1. [Upgrading from 2.1 to 2.2](#v2-1-v2-2)
1. [Upgrading from 2.0 to 2.1](#v2-0-v2-1)

<a name="v2-1-v2-2"></a>
## Upgrading from 2.1 to 2.2

### Upgrading Your Composer Dependency

To upgrade to Orchestra Platform 2.2, change your `"orchestra/foundation"` version to `"2.2.*"` in your `composer.json` file.

> As a pre-caution, remove `bootstrap/compiled.php` file if it exist to avoid possible error during upgrade.

### Adding Configuration Files & Options

Add the new `cipher` configuration option to your `app/config/app.php` file. The default value should be `MCRYPT_RIJNDAEL_256` constant.

	'cipher' => MCRYPT_RIJNDAEL_256,

Add the new `fallback_locale` configuration option to your `app/config/app.php` file. The default value should be `en`.

	'fallback_locale' => 'en',

Add the new alias to your `app/config/app.php`.

	'SoftDeletingTrait' => 'Illuminate\Database\Eloquent\SoftDeletingTrait',

Add new `app/config/services.php` file [from the repository](https://github.com/orchestral/platform/blob/2.2/app/config/services.php) ([raw](https://raw.githubusercontent.com/orchestral/platform/2.2/app/config/services.php)).

<a name="v2-0-v2-1"></a>
## Upgrading from 2.0 to 2.1

### Upgrading Your Composer Dependency

To upgrade to Orchestra Platform 2.1, change your `"orchestra/foundation"` version to `"2.1.*"` in your `composer.json` file.

> As a pre-caution, remove `bootstrap/compiled.php` file if it exist to avoid possible error during upgrade.

### Replace Files

Replace your `public/index.php` file with this [fresh copy from the repository](https://github.com/orchestral/platform/blob/2.1/public/index.php) ([raw](https://raw2.github.com/orchestral/platform/2.1/public/index.php)).

Replace your `artisan` file with this [fresh copy from the repository](https://github.com/orchestral/platform/blob/2.1/artisan) ([raw](https://raw2.github.com/orchestral/platform/2.1/artisan)).

### Adding Configuration Files & Options

Update your aliases and providers arrays in your `app/config/app.php` configuration file. The updated values for these arrays can be found in [this file](https://github.com/orchestral/platform/blob/2.1/app/config/app.php) ([raw](https://raw2.github.com/orchestral/platform/2.1/app/config/app.php)). Be sure to add your custom and package service providers / aliases back to the arrays.

Provides                                                        | Action
:---------------------------------------------------------------|:----------------------
Illuminate\Foundation\Providers\CommandCreatorServiceProvider   | Remove
Illuminate\Foundation\Providers\ComposerServiceProvider         | Remove
Illuminate\Foundation\Providers\ConsoleSupportServiceProvider   | Add
Illuminate\Foundation\Providers\KeyGeneratorServiceProvider     | Remove
Illuminate\Foundation\Providers\MaintenanceServiceProvider      | Remove
Illuminate\Foundation\Providers\OptimizeServiceProvider         | Remove
Illuminate\Foundation\Providers\RouteListServiceProvider        | Remove
Illuminate\Remote\RemoteServiceProvider                         | Add
Illuminate\Foundation\Providers\ServerServiceProvider           | Remove
Illuminate\Foundation\Providers\TinkerServiceProvider           | Remove
Orchestra\Debug\DebugServiceProvider                            | Add
Orchestra\Notifier\NotifierServiceProvider                      | Add
Orchestra\Optimize\OptimizeServiceProvider                      | Add
Orchestra\Auth\CommandServiceProvider                           | Remove
Orchestra\Extension\CommandServiceProvider                      | Remove
Orchestra\Memory\CommandServiceProvider                         | Remove
Orchestra\Foundation\ConsoleSupportServiceProvider              | Add


Update `redis.cluster` configuration section to `false` in your `app/config/database.php`.

Add the new `app/config/remote.php` file [from the repository](https://github.com/orchestral/platform/blob/2.1/app/config/remote.php) ([raw](https://raw2.github.com/orchestral/platform/2.1/app/config/remote.php)).

Add the new `expire_on_close` configuration option to your `app/config/session.php` file. The default value should be `false`.

Add the new `failed` configuration section to your `app/config/queue.php` file. Here are the default values for the section:

	'failed' => array(
    	'database' => 'mysql', 'table' => 'failed_jobs',
	),

#### Optional

Update the pagination configuration option in your `app/config/view.php` file to `pagination::slider-3` (if you're using Twitter Bootstrap 3 instead of Bootstrap 2).

### E-mail Templates

Update `app/views/emails/auth/reminder.blade.php` file with this [fresh copy from the repository](https://github.com/orchestral/platform/blob/2.1/app/views/emails/auth/reminder.blade.php) ([raw](https://raw2.github.com/orchestral/platform/2.1/app/views/emails/auth/reminder.blade.php)).

Add new `app/views/emails/auth/register.blade.php` file with this [fresh copy from the repository](https://github.com/orchestral/platform/blob/2.1/app/views/emails/auth/register.blade.php) ([raw](https://raw2.github.com/orchestral/platform/2.1/app/views/emails/auth/register.blade.php)).

### Controller Updates

If `app/controllers/BaseController.php` has a use statement at the top, change `use Illuminate\Routing\Controllers\Controller;` to `use Illuminate\Routing\Controller;`.

### Password Reminders Updates

Password reminders have been overhauled for greater flexibility. Update your `app/lang/en/reminders.php` language file to match [this updated file](https://github.com/orchestral/platform/blob/2.1/app/lang/en/reminders.php) ([raw](https://raw2.github.com/orchestral/platform/2.1/app/lang/en/reminders.php)).

### Environment Detection Updates

For security reasons, URL domains may no longer be used to detect your application environment. These values are easily spoofable and allow attackers to modify the environment for a request. You should convert your environment detection to use machine host names (`hostname` command on Mac & Ubuntu).

### Simpler Log Files

Laravel now generates a single log file: `app/storage/logs/laravel.log`. However, you may still configure this behavior in your `app/start/global.php` file.

### Removing Redirect Trailing Slash

In your `bootstrap/start.php` file, remove the call to `$app->redirectIfTrailingSlash()`. This method is no longer needed as this functionality is now handled by the `.htaccess` file included with the framework.

Next, replace your Apache `.htaccess` file with this [new one](https://github.com/orchestral/platform/blob/2.1/public/.htaccess) ([raw](https://raw2.github.com/orchestral/platform/2.1/public/.htaccess)) that handles trailing slashes.

### Current Route Access

The current route is now accessed via `Route::current()` instead of `Route::getCurrentRoute()`.

### Composer Update

Once you have completed the changes above, you can run the `composer update` function to update your core application files!
