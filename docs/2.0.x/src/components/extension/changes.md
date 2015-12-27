---
title: Extension Change Log

---

## Version 2.0 {#v2-0}

### v2.0.20 {#v2-0-20}

* Improved dependency injection for `Orchestra\Extension\RouteGenerator`.
* `Orchestra\Extension\Environment::activate()` and `Orchestra\Extension\Environment::deactivate()` now return boolean.
* Removed alias generation from service provider.

### v2.0.19 {#v2-0-19}

* Move commands to it's own service provider.
* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

### v2.0.18 {#v2-0-18}

* Fixed issue where proper folder permission still resolved to require FTP publishing.
* Re-enable command `php artisan orchestra:extension update {extension}`.

### v2.0.17 {#v2-0-17}

* Fixed inconsistent directory separator contain both \ and / in Windows environment.

### v2.0.16 {#v2-0-16}

* Fixed `Orchestra\Extension\RouteGenerator` doesn't create proper domain and prefix setup in certain condition including localhost.

### v2.0.15 {#v2-0-15}

* Fixed Class `Orchestra\Extension\Console\Str` not found, add use `Orchestra\Support\Str`.

### v2.0.14 {#v2-0-14}

* Add ability for extension to handle domain prefix instead of just path prefix via `Orchestra\Extension\RouteGenerator`.

### v2.0.13 {#v2-0-13}

* `Orchestra\Extension\Environment` should extends `Orchestra\Memory\Abstractable\Container`.
* Multiple code refactors.

### v2.0.12 {#v2-0-12}

* Tweak `php artisan orchestra:extension detect` response to show extension version.
* Add `php artisan orchestra:extension update {name}` to run migration and asset publish from console.

### v2.0.11 {#v2-0-11}

* Fixed possible issue with path resolver autoloading files for app.

### v2.0.10 {#v2-0-10}

* Fixed a possible bug when storing extension path meta in the database, especially if the installation is shared.

### v2.0.9 {#v2-0-9}

* Fixed a bug where registering `Orchestra\Acl` from within extension service provider fail as to attach to `Orchestra\Memory`.

### v2.0.8 {#v2-0-8}

* `"autoload"` config should first respect source-path folder, unless specified as full path.
* Fixed regression bug where safe mode no longer work.
* Deprecate `Orchestra\Extension\Environment::isActive()` and introduce `Orchestra\Extension\Environment::activated()`.
* Run `Session::put()` only if there changes for `orchestra.safemode` value.

### v2.0.7 {#v2-0-7}

* Configuration cleanup on `Orchestra\Extension\Dispatcher`.
* Update reserved extension name.
* Add "source-path" to `Orchestra\Extension\Publisher\MigrateManager::extension()`, allow migration to be done on source-path folder.
* Tweak extension dispatcher event on booting. The `orchestra.php` bootstrap file should be able to utilise event to hook with another extension, otherwise it best to use service provider.
* Introduce `extension.booted: {name}` event.

### v2.0.6 {#v2-0-6}

* Allow extension path to be predefined from `orchestra.json`.
* Add `"autoload"` and `"source-path"` options to `orchestra.json`.

### v2.0.5 {#v2-0-5}

* Code improvements.

### v2.0.4 {#v2-0-4}

* Modify boot sequence for `Orchestra\Extension`, this would allow `Orchestra\Foundation\FoundationServiceProvider` to have priority during boot.

### v2.0.3 {#v2-0-3}

* Fixed extension name detection for Windows environment.

### v2.0.2 {#v2-0-2}

* Add `Orchestra\Extension\Environment::isWritableWithAsset()` helper.

### v2.0.1 {#v2-0-1}

* Add additional keyword to extension' reserved name.
* Small docblock and code refactor improvement.

### v2.0.0 {#v2-0-0}

* Migrate `Orchestra\Extension` from Orchestra Platform 1.2.
* Add support for extension to register service provider using `orchestra.json`.
* Simplify the registration of service provider by utilizing `Illuminate\Foundation\Application::register()` method.
* Add command line utility via `Orchestra\Extension\Console\ExtensionCommand`.
* Add `Orchestra\Extension::route()` method to handle extension routing.
* Allow Extensions not to be started when in safe mode, using `Session::get('orchestra-safemode')`.
* Add `Orchestra\Extension::setMemoryProvider()` and `Orchestra\Extension::getMemoryProvider()` helpers.
* `Orchestra\Extension\Dispatcher` only load packages `orchestra.php` only after all extension (and service providers) has been registered.
* Allow `Orchestra\Extension\Publisher\AssetManager` to publish asset for orchestra/foundation.
* Start Extension before running publish command when activating an extension.
* Change `Orchestra\Extension\Dispatcher::start()` visibility to public.
* Prevent reserved name to be used as extension name.
