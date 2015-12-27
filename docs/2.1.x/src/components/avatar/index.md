---
title: Avatar Component

---

## Table of Content {#toc}

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Change Log]({doc-url}/components/avatar/changes#v2-1)
* [Github](https://github.com/orchestral/avatar)

## Version Compatibility {#compatibility}

Laravel    | Avatar
:----------|:----------
 4.1.x     | 2.1.x

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

	{
		"require": {
			"orchestra/avatar": "2.1.*"
		}
	}

And then run `composer install` from the terminal.

### Quick Installation {#quick-installation}

Above installation can also be simplify by using the following command:

	composer require "orchestra/avatar=2.1.*"

## Configuration {#configuration}

Add `Orchestra\Avatar\AvatarServiceProvider` service provider in `app/config/app.php`.

    'providers' => array(

        // ...
        'Orchestra\Avatar\AvatarServiceProvider',
    ),

You might also want to add `Orchestra\Avatar\Facade` to class aliases in `app/config/app.php`:

    'aliases' => array(

        // ...
        'Orchestra\Avatar' => 'Orchestra\Avatar\Facade',
    ),

## Usage {#usage}

You can easily display an avatar by passing a `User` instance.

    <?php

    $user = User::find(1);

    $avatar = Orchestra\Avatar::user($user)->render();
