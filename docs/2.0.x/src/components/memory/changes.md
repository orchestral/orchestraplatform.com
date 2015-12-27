---
title: Memory Change Log

---

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
