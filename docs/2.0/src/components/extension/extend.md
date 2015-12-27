---
title: Extending Extension

---

* [Add Extension Location](#add-extension-location)

## Add Extension Location {#add-extension-location}

By default, `Orchestra\Extension` is configured to search for extension under the following folders using `glob()` PHP function:

* `app`
* `workbench/*/*`
* `vendor/*/*`

If there a requirement to add non-distributed packages feel free to include your own structure, and include the path (preferably in `app/start/global.php`):

	App::make('orchestra.extension.finder')->addPath(base_path().'/modules/*/*/');

> Be sure to add modules autoloading structure to `app`'s `composer.json`.
