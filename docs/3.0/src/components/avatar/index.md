---
title: Avatar Component
badge: avatar

---

Avatar Component provide support for driver based avatar provider for your Laravel, PHP or Orchestra Platform application.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
5. [Change Log]({doc-url}/components/avatar/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

Laravel    | Avatar
:----------|:----------
 4.1.x     | 2.1.x
 4.2.x     | 2.2.x
 5.0.x     | 3.0.x

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/avatar": "~3.0"
	}
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/avatar=~3.0"

<a name="configuration"></a>
## Configuration

Add `Orchestra\Avatar\AvatarServiceProvider` service provider in `config/app.php`.

```php
'providers' => [

    // ...
    'Orchestra\Avatar\AvatarServiceProvider',
],
```

You might also want to add `Orchestra\Support\Facade\Avatar` to class aliases in `config/app.php`:

```php
'aliases' => [

    // ...
    'Avatar' => 'Orchestra\Support\Facade\Avatar',
],
```

<a name="usage"></a>
## Usage

You can easily display an avatar by passing a `App\User` instance.

```php
<?php

use App\User;

$user = User::find(1);
$avatar = Avatar::user($user);
```

You can use it in a view by rendering it.

```html
<img src="{{ $avatar }}" class="avatar">
```
