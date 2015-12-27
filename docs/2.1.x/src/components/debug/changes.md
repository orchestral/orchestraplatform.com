---
title: Artisan Debug Change Log

---

## Version 2.1 {#v2-1}

### v2.1.1 {#v2-1-1}

* Remove duplicate `str_replace_array()` helper.
* Implement [PSR-4](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-4-autoloader/psr-4-autoloader.md) autoloading structure.

### v2.1.0 {#v2-1-0}

* Add support for Orchestra Platform 2.1 and Laravel 4.1.

## Version 2.0 {#v2-0}

### v2.0.0 {#v2-0-0}

* Port `Illuminate/Exception/LiveServiceProvider` as `orchestra/debug` package.
* Prepare database bindings using `Illuminate\Database\Connection::prepareBindings()`.
