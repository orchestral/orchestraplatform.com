---
title: View Change Log

---

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
