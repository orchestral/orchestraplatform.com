---
title: Avatar Change Log

---

## Version 3.0 {#v3-0}

### v3.0.2 {#v3-0-2}

* Use "protocol-less" URL.

### v3.0.1 {#v3-0-1}

* Add fallback support to Laravel 5 configuration.

### v3.0.0 {#v3-0-0}

* Update support to Laravel Framework v5.0.
* Simplify PSR-4 path.
* Rename `Orchestra\Avatar\GravatarHandler` to `Orchestra\Avatar\Handlers\Gravatar`.
* Rename `Orchestra\Avatar\Abstractable\AbstractableHandler` to `Orchestra\Avatar\Handler`.

## Version 2.2 {#v2-2}

### v2.2.2@dev {#v2-2-2}

* Utilize `Illuminate\Support\Arr`.

### v2.2.1 {#v2-2-1}

* Fixes configuration is missing when rendering avatar.
* Move `Orchestra\Avatar\GravatarHandler::setIdentifierFromUser()` to `Orchestra\Avatar\Abstractable\AbstractableHandler`.

### v2.2.0 {#v2-2-0}

* Bump minimum version to PHP v5.4.0.
* Add support for Laravel Framework v4.2.

## Version 2.1 {#v2-1}

### v2.1.1 {#v2-1-1}

* Fixes configuration is missing when rendering avatar.
* Move `Orchestra\Avatar\GravatarHandler::setIdentifierFromUser()` to `Orchestra\Avatar\Abstractable\AbstractableHandler`.

### v2.1.0 {#v2-1-0}

* Initial release which include [Gravatar](https://en.gravatar.com/) avatar provider for Laravel Framework 4.1.x.
