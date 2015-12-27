---
title: Widget Change Log

---

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
