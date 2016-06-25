---
title: Resources Change Log

---

## Version 3.0 {#v3-0}

### v3.0.0 {#v3-0-0}

* Update support to Laravel Framework v5.0.
* Simplify PSR-4 path.

## Version 2.2 {#v2-2}

### v2.2.3@dev {#v2-2-3}

* Utilize `Illuminate\Support\Arr`.

### v2.2.2 {#v2-2-2}

* Add `get()`, `set()` and `forget()` helper method on `Orchestra\Facile\Container` to allow direct manipulation to it's attributes value.

### v2.2.1 {#v2-2-1}

* Fixes type-hinting to `Orchestra\Facile\Container`.

### v2.2.0 {#v2-2-0}

* Bump minimum version to PHP v5.4.0.
* Rename `Orchestra\Resources\Environment` to `Orchestra\Resources\Factory`.
* Return blank `Illuminate\Http\Response` (with `200` HTTP status) when `null` is returned from controller.

## Version 2.1 {#v2-1}

### v2.1.4 {#v2-1-4}

* Add `get()`, `set()` and `forget()` helper method on `Orchestra\Facile\Container` to allow direct manipulation to it's attributes value.

### v2.1.3 {#v2-1-3}

* Fixes type-hinting to `Orchestra\Facile\Container`.

### v2.1.2 {#v2-1-2}

* Implement [PSR-4](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-4-autoloader/psr-4-autoloader.md) autoloading structure.

### v2.1.1 {#v2-1-1}

* Return blank `Illuminate\Http\Response` (with `200` HTTP status) when `null` is returned from controller.

### v2.1.0 {#v2-1-0}

* Update support for Laravel 4.1 controller dispatching.
* Refactor dependency injection to use specific instance, when applicable.

## Version 2.0 {#v2-0}

### v2.0.5 {#v2-0-5}

* Return blank `Illuminate\Http\Response` (with `200` HTTP status) when `null` is returned from controller.

### v2.0.4 {#v2-0-4}

* Refactor `Orchestra\Resources\Response` and properly content as empty string shouldn't abort the app.
* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

### v2.0.3 {#v2-0-3}

* Fixed nested resources controller doesn't return valid parameters.
* Add Guardfile.

### v2.0.2 {#v2-0-2}

* Code improvements.

### v2.0.1 {#v2-0-1}

* `Orchestra\Resources` shouldn't accept "." or "/" as a name, child resource should accept ".".

### v2.0.0 {#v2-0-0}

* Migrate `Orchestra\Resources` from Orchestra Platform 1.2.
* Add `Orchestra\Resources\Dispatcher` and `Orchestra\Resources\Response` to isolate class responsibility.
* Add support for Laravel 4 response system which include `Illuminate\Http\RedirectResponse`, `Illuminate\Http\JsonResponse` and `Illuminate\Http\Response`.
* Add support to use `resource` controller instead of just `restful` controller.
* `Orchestra\Resources\Response` should respect non-html response instead of converting it to `text/html` content type.
