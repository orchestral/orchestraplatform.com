---
title: Facile Change Log

---

## Version 2.1 {#v2-1}

### v2.1.4 {#v2-1-4}

* Fixes type-hinting to `Orchestra\Support\Contracts\CsvableInterface`.

### v2.1.3 {#v2-1-3}

* Replace `Orchestra\Facile\Container::on()` with `Orchestra\Facile\Container::when()`.
* Allow `Orchestra\Facile\Container::format()` to take format configuration as second parameter.

### v2.1.2 {#v2-1-2}

* Rename `Orchestra\Facile\Response` to `Orchestra\Facile\Container`.
* Add support to filter data transport between format using `Orchestra\Facile\Container::on()` method which allow `only` or `except` keyword.
* Add support to easily export data as Comma-Separated Value (CSV).

### v2.1.1 {#v2-1-1}

* Implement [PSR-4](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-4-autoloader/psr-4-autoloader.md) autoloading structure.

### v2.1.0 {#v2-1-0}

* Update code to support `Illuminate\Support\Contracts\ArrayableInterface` support in `Illuminate\Pagination\Paginator`
* Refactor `Orchestra\Facile` to only include minimal dependency injection.

## Version 2.0 {#v2-0}

### v2.0.5 {#v2-0-5}

* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

### v2.0.4 {#v2-0-4}

* Update code to support `Illuminate\Support\Contracts\ArrayableInterface` support in `Illuminate\Pagination\Paginator` and refactor Facile to receive app instance.
* Multiple refactors.

### v2.0.3 {#v2-0-3}

* Fixed `Orchestra\Facile\FacileServiceProvider` causing an infinite loop while trying to register the deferred service.

### v2.0.2 {#v2-0-2}

* Check request header to detect allowed Content-Type instead of manually figuring out the format.
* Fixed typehinting to `Eloquent`.

### v2.0.1 {#v2-0-1}

* Code improvements.

### v2.0.0 {#v2-0-0}

* Migrate `Orchestra\Facile` from Orchestra Platform 1.2.
