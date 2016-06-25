---
title: Installation

---

1. [Minimum Server Requirements](#server-requirement)
2. [Install Composer](#install-composer)
3. [Install Orchestra Platform](#install-orchestra-platform)
  - [Download](#download)
  - [Preparing Setup](#configuration)
  - [Setup](#setup)
4. [Pretty URLs](#pretty-urls)

<a name="server-requirement"></a>
## Minimum Server Requirements

Orchestra Plaftorm has a few system requirements:

* PHP >= 5.4.0 (we highly recommend using PHP 5.6 for your projects).
* PHP Extensions:
  - OpenSSL
  - Mbstring
* Apache, nginx, or another compatible web server.
* SQLite, MySQL, PostgreSQL, or SQL Server PDO drivers.

<a name="install-composer"></a>
## Install Composer

Orchestra Platform utilizes [Composer](http://getcomposer.org/) to manage its dependencies. So, before using Orchestra Platform, you will need to make sure you have Composer installed on your machine.

<a name="install-orchestra-platform"></a>
## Install Orchestra Platform

<a name="download"></a>
### Download

You can install Orchestra Platform using Composer:

    composer create-project orchestra/platform --prefer-dist

<a name="configuration"></a>
### Preparing Installation

To running the setup to install Orchestra Platform on your local machine, it best to do the following:

1. Set the [application key]({doc-url}/security#app-key) by running `php artisan key:generate`, this will be reflected as `APP_KEY` in `.env`.
2. Setup `APP_ENV` values, the default `local` environment is commonly used for local environment.
3. Configure database connection via `.env`.
4. Folders within `storage` and `bootstrap/cache` requires write access by the web server.

<a name="setup"></a>
### Setup

Once Orchestra Platform is properly configured, we need to run the installation and create the application basic schema (including administrator user).

1. Run `php artisan serve` or use your prefered web server stack or Vagrant (Homestead etc).
2. Browse to the installation page, for example `http://localhost:8000/admin` and follow the installation process.
3. And... you're done.

<a name="pretty-urls"></a>
## Pretty URLs

<a name="pretty-urls-for-apache"></a>
### Apache

The framework ships with a `public/.htaccess` file that is used to allow URLs without `index.php`. If you use Apache to serve your Orchestra Platform application, be sure to enable the `mod_rewrite` module.

If the `.htaccess` file that ships with Orchestra Platform does not work with your Apache installation, try this one:

    Options +FollowSymLinks
    RewriteEngine On

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]

<a name="pretty-urls-for-nginx"></a>
### Nginx

On Nginx, the following directive in your site configuration will allow "pretty" URLs:

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

Of course, when using Homestead, pretty URLs will be configured automatically.
