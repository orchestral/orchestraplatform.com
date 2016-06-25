---
title: Kernel Change Log

---

## Version 3.0 {#v3-0}

### v3.0.4 {#v3-0-4}

* HTTP:
  - Bind custom messages values to `Orchestra\Http\FormRequest`.
  - Add `Orchestra\Http\HashIdServiceProvider` which utilize `hashids/hashids` packages to generate unique short ID for URL.
  
### v3.0.3 {#v3-0-3}

* Config:
  - Allow config to be stored in sub-directories which bring compatibility with Laravel 5 packages.
  - Tweak how cached config are loaded by introducing `Orchestra\Config\Repository::setFromCache()`.
  - Add `Orchestra\Config\NamespacedItemResolver`.

### v3.0.2 {#v3-0-2}

* HTTP:
  - Bind route parameters to `Orchestra\Http\FormRequest`.
  - `Orchestra\Http\RouteManager::handles()` should ignored valid URL.

### v3.0.1 {#v3-0-1}

* Add `orchestra/database` to replace clause in `composer.json`.
* Add `Orchestra\Database\CacheDecorator`.

### v3.0.0 {#v3-0-0}

* Initial release for Laravel Framework v5.0.
* Split components to five (5) sub-components; Config, Contracts, Database, HTTP, and Routing.
* Config:
  - Based from `illuminate/config` v4.2.
  - Add `Orchestra\Config\Bootstrap\LoadConfiguration`.
  - Add `Orchestra\Config\Console\ConfigCacheCommand`.
  - Set `mb_internal_encoding('UTF-8');` on bootstrap.
* Contracts:
  - Move various Interface to `orchestra/contracts`.
* Database:
  - Based from `illuminate/database`.
  - Add `Orchestra\Database\Console\Migrations\MigrateCommand` with `--package` and `--realpath` options.
* HTTP:
  - Move `Orchestra\Http\RouteManager` from `orchestra/foundation`.
  - Add experimental `Orchestra\Http\FormRequest`.
* Routing:
  - Based from `illuminate/routing`.
  - Add filtering toggle to disable filters during unit testing.
  - Add multiple contracts:
    - `Orchestra\Contracts\Routing\CallableController`.
    - `Orchestra\Contracts\Routing\FilterableController`.
    - `Orchestra\Contracts\Routing\StackableController`.
  - Add `redirect_with_errors()` and `redirect_with_message()` helper function.
