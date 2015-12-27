---
title: Using Auth

---

Essentially, the Auth class offered by Laravel 4 is already good enough for normal usage. Orchestra Platform only extends the default operation and allow a user to be link with one or many roles.

* [Retrieving Roles](#retrieving-roles)
* [Checking Roles](#checking-roles)
* [Setup Custom Roles Relationship](#setup-custom-roles)

## Retrieving Roles {#retrieving-roles}

Retrieve user's roles is as simple as:

	$roles = Auth::roles();

## Checking Roles {#checking-roles}

### Check if user has all of the following roles

	if (Auth::is(['admin', 'editor'])) {
		echo "Is an admin and editor";
	}

### Check if user has any of the following roles

    if (Auth::isAny(['member', 'admin'])) {
        echo "Is a member or admin";
    }

### Check if user has none of the following roles

    if (Auth::isNot(['admin', 'editor'])) {
        echo "Isn't an admin and editor";
    }

### Check if user has none any of the following roles

    if (Auth::isNotAny(['member', 'admin'])) {
        echo "Isn't a member or admin";
    }

## Setup Custom Roles Relationship {#setup-custom-roles}

The default event listener `orchestra.auth: roles` is no longer registered in `Orchestra\Auth\AuthServiceProvider`. This would allow better configuration over convertion control for your application (Laravel).

An example setup code would be:

    Auth::setup(function ($user, $roles) {
	    // If user is not logged in.
	    if (is_null($user)) {
		    return $roles;
	    }

	    if ($user->is_admin) {
	    	$roles = array('Administrator');
	    } else {
	    	$roles = array('Member');
	    }

	    return $roles;
    });

> For Orchestra Platform, the listener are automatically registered in the bootstrap process and the above code shouldn't be used!
