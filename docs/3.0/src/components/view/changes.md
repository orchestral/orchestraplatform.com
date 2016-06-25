---
title: View Change Log

---

## Version 3.0 {#v3-0}

### v3.0.1 {#v3-0-1}

* Add `php artisan theme:optimize` command.
* Rename `Orchestra\View\Console\BaseCommand` to `Orchestra\View\Console\Command`.

### v3.0.0 {#v3-0-0}

* Update support for Laravel Framework v5.0.
* Simplify PSR-4 path.
* Add `Orchestra\View\Bootstrap\LoadCurrentTheme`.
* Rename `Orchestra\View\Theme\Container` to `Orchestra\View\Theme\Theme`.

## Version 2.2 {#v2-2}

### v2.2.3 {#v2-2-3}

* Add confirmation when running `activate` command on `"production"` environment.
* Utilize `Illuminate\Support\Arr`.

### v2.2.2 {#v2-2-2}

* Allow a theme manifest to support type option which can limit the visibility to either "frontend" or "backend" (default to accessible by both type).

### v2.2.1 {#v2-2-1}

* Fixes invalid theme name when activating a theme using `php artisan theme:activate` command.

### v2.2.0 {#v2-2-0}

* Bump minimum version to PHP v5.4.0.
* Add `php artisan theme:detect` and `php artisan theme:activate` command.

## Version 2.1 {#v2-1}

### v2.1.4 {#v2-1-4}

* Allow a theme manifest to support type option which can limit the visibility to either "frontend" or "backend" (default to accessible by both type).

### v2.1.3 {#v2-1-3}

* Fixes invalid theme name when activating a theme using `php artisan theme:activate` command.

### v2.1.2 {#v2-1-2}

* Add `php artisan theme:detect` and `php artisan theme:activate` command.

### v2.1.1 {#v2-1-1}

* Implement [PSR-4](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-4-autoloader/psr-4-autoloader.md) autoloading structure.

### v2.1.0 {#v2-1-0}

* Cache found views has been added to `Illuminate\View\FileViewFinder`, removing duplicate code.
* When theme is swap, the previous selected theme path should completely remove view finder paths.
* Add additional events:
  - orchestra.theme.set: {name}
  - orchestra.theme.unset: {name}
  - orchestra.theme.boot: {name}
* Allow finding theme with inconsistent directory separator.
* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

## Version 2.0 {#v2-0}

### v2.0.6 {#v2-0-6}

* Allow finding theme with inconsistent directory separator.
* Implement [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

### v2.0.5 {#v2-0-5}

* Cache found views has been added to `Illuminate\View\FileViewFinder`, removing duplicate code.

### v2.0.4 {#v2-0-4}

* When theme is swap, the previous selected theme path should completely remove view finder paths.
* Add additional events:
  - orchestra.theme.set: {name}
  - orchestra.theme.unset: {name}
  - orchestra.theme.boot: {name}

### v2.0.3 {#v2-0-3}

* Code improvements.

### v2.0.2 {#v2-0-2}

* Fixed theme name detection for Windows environment.
* Rename `Orchestra\View\Finder::getFilename()` to `Orchestra\View\Finder::parseThemeNameFromPath()`.

### v2.0.1 {#v2-0-1}

* Allow theme name to be reserved from `theme.json`, and introduce uid to store theme folder name as an alternative name.

### v2.0.0 {#v2-0-0}

* Migrate `Orchestra\View` and `Orchestra\Theme` from Orchestra Platform 1.2.
* Deprecate and remove `Orchestra\Theme::map()` usage.
* Allow queried view to be cache for subsequent call within the same request using `Orchestra\View\FileViewFinder`.
* Add `Orchestra\View\Theme\Finder` for theme management purpose.
* `Orchestra\View\Theme\Manifest` should be able to return theme name.
