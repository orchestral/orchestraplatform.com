---
title: Model Change Log

---

## Version 2.1 {#v2-1}

### v2.1.5 {#v2-1-5}

* Add `remember_token` to `Orchestra\Model\User::$hidden` attribute.

### v2.1.4 {#v2-1-4}

* Implement changes to `Illuminate\Auth\UserInterface` on v4.1.26 which fixes a vulnerability to authentication with remember me.

### v2.1.3 {#v2-1-3}

* Add `Orchestra\Model\User::activate()`, `Orchestra\Model\User::deactivate()` and `Orchestra\Model\User::suspend()` helpers.
* Implement [PSR-4](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-4-autoloader/psr-4-autoloader.md) autoloading structure.

### v2.1.2 {#v2-1-1}

* Use `Orchestra\Model\User::whereHas('roles')` to get filtered search instead of doing join query.

### v2.1.1 {#v2-1-1}

* Fixes `Orchestra\Model\User::isNot()` and `Orchestra\Model\User::isNotAny()` helper class.
* Rename `Orchestra\Model\User::resolveRolesAsArray()` to `Orchestra\Model\User::getRoles()` with visibility changed to public. Additionally allow relations to be loaded from cache if it's available instead of querying the database each time it being used.
* Serialize storage value on user_meta to allow adding value other than string.

### v2.1.0 {#v2-1-0}

* Add support for Laravel 4.1 and Orchestra Platform 2.1.
* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.
* Implement `Orchestra\Notifier\RecipientInterface`.
* Abstract `Orchestra\Model\Memory\UserMetaRepository` and `Orchestra\Model\Memory\UserMetaProvider` from orchestra/foundation which allow it to be used outside of Orchestra Platform.
* Add multiple helpers method to `Orchestra\Model\User`:
  - `attachRole()`
  - `detachRole()`
  - `is()`
  - `isAny()`
  - `isNot()`
  - `isNotAny()`

## Version 2.0 {#v2-0}

### v2.0.1 {#v2-0-1}

* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

### v2.0.0 {#v2-0-0}

* Move orchestra/model out of orchestra/foundation component to allow relevant models to be used directly in orchestra/auth.

