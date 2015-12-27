---
title: Widget Change Log

---

## Version 2.1 {#v2-1}

### v2.1.2 {#v2-1-2}

* Implement [PSR-4](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-4-autoloader/psr-4-autoloader.md) autoloading structure.

### v2.1.1 {#v2-1-1}

* Update configuration and add ability to override default driver.
* Add `Orchestra\Widget\WidgetManager::of()` helper to handle widget generation using closure.

### v2.1.0 {#v2-1-0}

* Add `Orchestra\Widget\Drivers::is()` to allow direct manipulation of `Illuminate\Support\Fluent` through `Orchestra\Support\Nesty::is()` API.
* Predefined package path to avoid additional overhead to guest package path.
* Refactor class names to better describe the usage.

## Version 2.0 {#v2-0}

### v2.0.4 {#v2-0-4}

* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

### v2.0.3 {#v2-0-3}

* Add `Orchestra\Widget\Drivers::is()` to allow direct manipulation of `Illuminate\Support\Fluent` through `Orchestra\Support\Nesty::is()` API.

### v2.0.2 {#v2-0-2}

* Code improvements.

### v2.0.1 {#v2-0-1}

* Update `Orchestra\Widget\WidgetManager` based on changes to [Orchestra\Support](/docs/2.0/components/support/changes#v2.0.2)

### v2.0.0 {#v2-0-0}

* Migrate `Orchestra\Widget` from Orchestra Platform 1.2.
* Change the way `Orchestra\Widget` handle positional insert; `before` to `<`, `after` to `>` and `child-of` to `^`.
* Implements `ArrayIterator`, eliminate the requirement to use `$widget->getItems()`.
* Move `Orchestra\Widget\Nesty` to `Orchestra\Support\Nesty`.
