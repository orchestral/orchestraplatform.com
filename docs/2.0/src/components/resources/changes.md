---
title: Resources Change Log

---

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
