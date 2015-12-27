---
title: Troubleshooting

---

* [Using safe mode](#safe-mode)
* [Missing installation](#missing-installation)
* [Unable to assign multiple Orchestra\Memory instance](#unable-to-assign-multiple-memory-instance)
* [Error on SessionHandler::read()](#error-sessionhandler-read)

## Using safe mode {#safe-mode}

There would be time when you might face problem with Orchestra Platform where an extension might cause a bug and your application stop working. In such event, you can use the safe mode to stop any extension from being loaded during bootstrap.

To do this, just add `?safe_mode=on` to your URL (in the browser). This way, we would create a session data to indicate that you are browsing the site in safe mode. Once you have deactivate any problematic/broken extension just add `?safe_mode=off` to browse the website normally (with extensions re-enabled).

## Missing installation {#missing-installation}

If you come across situation where your application suddenly when back as it wasn't installed, do check that `app/storage` contain the correct permission.

    $ chmod -Rf 777 app/storage

## Unable to assign multiple Memory instance {#unable-to-assign-multiple-memory-instance}

In any event where the application stop with the following exception `Unable to assign multiple Orchestra\Memory instance`, it means that for some reason you have multiple call to assign `Orchestra\Memory` to the same ACL instance.

    <?php

    Orchestra\Acl::make('acme')->attach(Orchestra\App::memory());

> It would be adviced to have this code included from a service provider's `boot()` method.

## Error on SessionHandler::read() {#error-sessionhandler-read}

	SessionHandler::read(): The session id is too long or contains illegal characters, valid characters are a-z, A-Z, 0-9 and '-,'

In any event where the application stop with the following exception. Please rename your [cookie name](https://github.com/orchestral/platform/blob/2.1/app/config/session.php#L99).
