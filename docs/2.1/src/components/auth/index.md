---
title: Auth Component

---

Auth Component extends the functionality of `Illuminate\Auth` with the extra functionality to retrieve users' role. This is important when we want to use `Orchestra\Acl` to manage application Access Control List (ACL).

## Table of Content {#toc}

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage]({doc-url}/components/auth/usage)
  - [Auth Usage]({doc-url}/components/auth/usage)
  - [RBAC and ACL Usage]({doc-url}/components/auth/rbac)
  - [Integration with Memory]({doc-url}/components/auth/memory-integration)
* [Change Log]({doc-url}/components/auth/changes#v2-1)
* [Github](https://github.com/orchestral/auth)

## Version Compatibility {#compatibility}

Laravel    | Auth
:----------|:----------
 4.0.x     | 2.0.x
 4.1.x     | 2.1.x

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/auth": "2.1.*"
		}
	}

And then run `composer install` from the terminal.

### Quick Installation {#quick-installation}

Above installation can also be simplify by using the following command:

	composer require "orchestra/auth=2.1.*"

## Configuration {#configuration}

Next add the service provider in `app/config/app.php`.

	'providers' => array(

		// ...
		# Remove 'Illuminate\Auth\AuthServiceProvider'
		# and add 'Orchestra\Auth\AuthServiceProvider'

		'Orchestra\Auth\AuthServiceProvider',
		'Orchestra\Memory\MemoryServiceProvider',

		'Orchestra\Auth\CommandServiceProvider',
	),

> `Orchestra\Auth\AuthServiceProvider` should replace `Illuminate\Auth\AuthServiceProvider`.

### Aliases

To make development easier, you could add `Orchestra\Support\Facades\Acl` alias for easier reference:

	'aliases' => array(

		'Orchestra\Acl' => 'Orchestra\Support\Facades\Acl',

	),

### Migrations

Before we can start using Auth Component, please run the following:

	php artisan auth:migrate

> The command utility is enabled via `Orchestra\Auth\CommandServiceProvider`.

Optionally you can enable Memory Component to use it with `Orchestra\Acl`, please run the following:

	php artisan memory:migrate

> The command utility is enabled via `Orchestra\Memory\CommandServiceProvider`.

