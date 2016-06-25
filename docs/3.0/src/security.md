---
title: Securing Orchestra Platform

---

1. [Application Key](#app-key)
2. [Environment Configuration](#environment-configuration)
3. [Use Better Session Driver](#use-better-session-driver)
4. [Disallow access to `.blade.php` for themes](#disable-access-to-theme)

<a name="app-key"></a>
## Application Key

The first thing you should do before running Orchestra Platform is set your application key to a random string. If you download Orchestra Platform via Composer, this key has probably already been set for you during composer install. You can also rerun this command:

    php artisan key:generate

Typically, this string should be 32 characters long. The key can be set in the `.env` environment file.

> **If the application key is not set, your user sessions and other encrypted data will not be secure!**

<a name="environment-configuration"></a>
## Environment Configuration

First of all, ensure that `APP_DEBUG` is only set to `true` on local development machine, for production environment you should set this to `false`. This would avoid your user from seeing the full error stack trace if there any error in your application.

You might also consider using `production` as the default environment name for production code. This would allow Orchestra Platform to run some pre-define optimization during each deployment via:

    php artisan orchestra:assemble

<a name="use-better-session-driver"></a>
## Use Better Session Driver

Orchestra Platform recommends using either Redis, Memcached or APC session driver (or at least database driver). This help making sure we can handle session request without any interruption especially when for handling CSRF or Login Throttling.

You can edit the driver from `.env` file.

<a name="disable-access-to-theme"></a>
## Disallow access to `.blade.php` for themes

<a name="disable-access-to-theme-for-apache"></a>
#### Apache

Configuration is included in the default `public/.htaccess`:

    # Secure Front Themes...

    RewriteRule ^themes/.*\.(blade.php|php)$ - [F,L,NC]

<a name="disable-access-to-theme-for-nginx"></a>
#### Nginx

You can add the following configuration:

    location ~ ^/themes/(.*)\.php$ {
        deny all;
    }
