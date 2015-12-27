---
title: Memory Change Log

---

## Version 2.1 {#v2-1}

### v2.1.6 {#v2-1-6}

* Fixes mass assignment issue when using Eloquent driver.

### v2.1.5 {#v2-1-5}

* Swap type-hint from `Illuminate\Cache\CacheManager` to `Illuminate\Cache\Repository` to slightly reduce tight-coupling to Laravel app.

### v2.1.4 {#v2-1-4}

* Implement [PSR-4](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-4-autoloader/psr-4-autoloader.md) autoloading structure.

### v2.1.3 {#v2-1-3}

* Replace `array_set()` with `array_add()` when loading value from storage.
* Avoid caching fallback instance since this could cause redundant insertion to the database.
* Allow to get handler instance using `Orchestra\Memory\Provider::getHandler()`.
* Add `Orchestra\Memory\Abstractable\Handler::getStorageName()` and `Orchestra\Memory\Abstractable\Handler::getName()` helper method.
* Tweak the way `Orchestra\Memory\Abstractable\Handler::isNewKey()` is detected.

### v2.1.2 {#v2-1-2}

* Improve type checking for `Orchestra\Memory\Abstractable\Container::attached()` and fixes docblock.
* Avoid generating checksum from running `serialize()` on an already serialized string.
* Avoid using `continue` in `foreach`.

### v2.1.1 {#v2-1-1}

* Fixes generating checksum for non-string value.

### v2.1.0 {#v2-1-0}

* Add `Orchestra\Memory\Abstractable\Container`.
* Predefined package path to avoid additional overhead to guest package path.
* Convert database schema to use `longText()` instead of `binary()`.
* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.
* Rename command to `php artisan memory:migrate`.
* Implement caching for both eloquent and fluent driver.
* Add `Orchestra\Memory\MemoryManager::setDefaultDriver()` method.

## Version 2.0 {#v2-0}

### v2.0.5 {#v2-0-5}

* Convert database schema to use `longText()` instead of `binary()`.

### v2.0.4 {#v2-0-4}

* Move commands to it's own service provider.
* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

### v2.0.3 {#v2-0-3}

* Add `Orchestra\Memory\Abstractable\Container`.

### v2.0.2 {#v2-0-2}

* Code improvements.

### v2.0.1 {#v2-0-1}

* Minor docblock and code refactoring improvement.

### v2.0.0 {#v2-0-0}

* Migrate `Orchestra\Memory` from Orchestra Platform 1.2.
* Rename `Orchestra\Memory::shutdown()` to `Orchestra\Memory::finish()`.
* Add `Orchestra\Memory::makeOrFallback()` for easy usage to switch to `Orchestra\Memory\Drivers\Runtime` when database connection is not correct.
