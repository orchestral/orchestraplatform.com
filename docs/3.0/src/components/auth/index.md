---
title: Auth Component
badge: auth

---

Auth Component extends the functionality of `Illuminate\Auth` with the extra functionality to retrieve users' role. This is important when we want to use `ACL` to manage application Access Control List (ACL).

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
  - [Retrieving Roles](#retrieving-roles)
  - [Checking Roles](#checking-roles)
  - [Setup Custom Roles Relationship](#setup-custom-roles)
5. [Change Log]({doc-url}/components/auth/changes#v3-0)

<a name="Compatibility"></a>
## Version Compatibility

Laravel    | Auth
:----------|:----------
 4.0.x     | 2.0.x
 4.1.x     | 2.1.x
 4.2.x     | 2.2.x
 5.0.x     | 3.0.x

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/auth": "~3.0"
	}
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/auth=~3.0"

<a name="configuration"></a>
## Configuration

Next add the service provider in `config/app.php`.

```php
'providers' => [

	// ...
	# Remove 'Illuminate\Auth\AuthServiceProvider'
	# and add 'Orchestra\Auth\AuthServiceProvider'

	'Orchestra\Auth\AuthServiceProvider',
	'Orchestra\Authorization\AuthorizationServiceProvider',
	'Orchestra\Memory\MemoryServiceProvider',

	'Orchestra\Auth\CommandServiceProvider',
	'Orchestra\Memory\CommandServiceProvider',
],
```

> `Orchestra\Auth\AuthServiceProvider` should replace `Illuminate\Auth\AuthServiceProvider`.

### Aliases

To make development easier, you could add `Orchestra\Support\Facades\ACL` alias for easier reference:

```php
'aliases' => [

	'ACL' => 'Orchestra\Support\Facades\ACL',

],
```

### Migrations

Before we can start using Auth Component, please run the following:

    php artisan auth:migrate

> The command utility is enabled via `Orchestra\Auth\CommandServiceProvider`.

Optionally you can enable Memory Component to use it with `ACL`, please run the following:

    php artisan memory:migrate

> The command utility is enabled via `Orchestra\Memory\CommandServiceProvider`.

<a name="usage"></a>
## Usage

Essentially, the Auth class offered by Laravel is already good enough for normal usage. Orchestra Platform only extends the default operation and allow a user to be link with one or many roles.

1. [Retrieving Roles](#retrieving-roles)
2. [Checking Roles](#checking-roles)
3. [Setup Custom Roles Relationship](#setup-custom-roles)

<a name="retrieving-roles"></a>
### Retrieving Roles

Retrieve user's roles is as simple as:

```php
$roles = Auth::roles();
```

<a name="checking-roles"></a>
### Checking Roles

Check if user has all of the following roles.

```php
if (Auth::is(['admin', 'editor'])) {
	echo "Is an admin and editor";
}
```

Check if user is any of the following roles.

```php
if (Auth::isAny(['member', 'admin'])) {
    echo "Is a member or admin";
}
```

Check if user is not of the following roles.

```php
if (Auth::isNot(['admin', 'editor'])) {
    echo "Isn't an admin and editor";
}
```

Check if user has none any of the following roles.

```php
if (Auth::isNotAny(['member', 'admin'])) {
    echo "Isn't a member or admin";
}
```

<a name="setup-custom-roles"></a>
### Setup Custom Roles Relationship

This would allow better configuration over convertion control for your application (Laravel).

An example setup code would be:

```php
Auth::setup(function ($user, $roles) {
    // If user is not logged in.
    if (is_null($user)) {
	    return $roles;
    }

    if ($user->is_admin) {
    	$roles = ['Administrator'];
    } else {
    	$roles = ['Member'];
    }

    return $roles;
});
```

> For Orchestra Platform, the listener are automatically handled in `Orchestra\Foundation\Bootstrap\UserAccessPolicy` and the above code shouldn't be used!
