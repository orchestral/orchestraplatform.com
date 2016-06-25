---
title: Publisher Change Log

---

## Version 3.0 {#v3-0}

### v3.0.1 {#v3-0-1}

* Ensure app migration is published when activating app as an extension.

### v3.0.0 {#v3-0-0}

* Update support to Laravel Framework v5.0.
* Simplify PSR-4 path.
* Add `Orchestra\Publisher\Publishing\AssetPublisher`.
* Add `Orchestra\Publisher\Publishing\ConfigPublisher`.
* Add `Orchestra\Publisher\Publishing\ViewPublisher`.
* Add `php artisan publish:asset`, `php artisan publish:config` and `php artisan publish:view` command.
* Allow public directory to be either `./public` or `./resources/public` from the package base directory.

## Version 2.2 {#v2-2}

### v2.2.1 {#v2-2-1}

* Add `Orchestra\Publisher\MigrateManager::package()` helper.

### v2.2.0 {#v2-2-0}

* Bump minimum version to PHP v5.4.0.

## Version 2.1 {#v2-1}

### v2.1.1 {#v2-1-1}

* Add `Orchestra\Publisher\MigrateManager::package()` helper.

### v2.1.0 {#v2-1-0}

* Initial release by extracting publishing responsibility from `orchestra/extension`.
