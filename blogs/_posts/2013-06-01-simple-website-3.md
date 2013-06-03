---
layout: single-blog
title: Simple Website with Orchestra Platform 2 (Part 3)
lead: Defining Basic Role Based Access Control
author:
  name: crynobone
  url: https://github.com/crynobone

---

If you haven't read [Simple Website with Orchestra Platform 2 (Part 2)](/blogs/2013/06/01/simple-website-2/), please do so. In this chapter I would focus on how you can create custom Role Based Access Control for your application. Yes I did say I'm suppose to talk about creating resource in this chapter but resource is nothing without authorization, right?

## Basic of ACL

Orchestra Platform by default is using `orchestra` namespace for ACL, and each extension can extend this namespace or create their own. I personally would prefer each extension to create own namespace as this would avoid conflict between extension and make it easier for the end user to understand the responsibility of each ACL namespace. So where should we place this? Each extension can have a [start file](/docs/2.0/components/extension/usage/#start-file), so let's create on for `app`, which should be at `app/orchestra.php`.

	<?php
	
	Orchestra\Acl::make('playground')->attach(Orchestra\App::memory());

> Now remember that this file only be included if the extension is activated and booted by Orchestra Platform.

By only reloading <http://localhost:8000> you can see that our database is populated with the new ACL schema.

	mysql> SELECT `value` FROM `orchestra_options` WHERE `name`='acl_playground';
	+------------------------------------------------------------------------------+
	| value                                                                        |
	+------------------------------------------------------------------------------+
	| a:3:{s:7:"actions";a:0:{}s:5:"roles";a:1:{i:0;s:5:"guest";}s:3:"acl";a:0:{}} |
	+------------------------------------------------------------------------------+
	1 row in set (0.00 sec)

As you can see from above we are storing the ACL metric as serialized data, and this is mostly what you would find when dealing with `Orchestra\Memory`.

Name     | Description
:--------|:-----------------------
actions  | Actions is either route or activity that we as a user can do (or not do).
roles    | Roles are user group that a user can belong to.
acl      | Is a boolean mapping between actions and roles, which determine whether a role is allow to do an action.

## Seeding the ACL

So, once we have to base schema setup, we need to populate the ACL configuration to our `playground` namespace. Orchestra Platform by default would create two (2) default role which is `Administrator` and `Member`, which is fine for now. As of actions, we should say that `Administrator` should be able to `manage article` and `manage page`, while `Member` and `Guest` should be able to `view article` and `view page`.

Ideally this is what you need to configure:

	$acl   = Orchestra\Acl::make('playground');
	$roles = Orchestra\Model\Role::lists('name');

	// Lets attach roles to our ACL.
	$acl->roles()->fill($roles);

	// Lets also attach actions to our ACL.
	$viewActions = ["View Article", "View Page"];
	$actions     = array_merge($viewActions, ["Manage Article", "Manage Page"]);
	
	$acl->actions()->fill($actions);

	// Administrator should allowed to have all.
	$acl->allow('Administrator', $actions);

	// Members and Guest should only allowed to view.
	$acl->allow(["Guest", "Member"], $viewActions);

> You can also use `Orchestra\Model\Role::admin()` and `Orchestra\Model\Role::member()` helper to get administrator and member name.

It would be easier if we can run this once and be done with it. Which is why I prefer it to be part of migration.

	$ php artisan migrate:make seed_playground_acls
	
	Created Migration: 2013_06_02_121335_seed_playground_acls
	Generating optimized class loader
	Compiling common classes

The content of our migration would be.

	<?php

	use Illuminate\Database\Migrations\Migration;

	class SeedPlaygroundAcls extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			$acl   = Orchestra\Acl::make('playground');
			$roles = Orchestra\Model\Role::lists('name');

			// Lets attach roles to our ACL.
			$acl->roles()->fill($roles);

			// Lets also attach actions to our ACL.
			$viewActions = ["View Article", "View Page"];
			$actions     = array_merge($viewActions, ["Manage Article", "Manage Page"]);
			
			$acl->actions()->fill($actions);

			// Administrator should allowed to have all.
			$acl->allow('Administrator', $actions);

			// Members and Guest should only allowed to view.
			$acl->allow(["Guest", "Member"], $viewActions);
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Orchestra\App::memory()->forget('acl_playground');
		}

	}

### Time to migrate, again

Now do we need to run `php artisan migrate`? The answer would be no! Orchestra Platform already provide a one click **Migrate and Publish** button for each of your extension, and for our case it accessible from <http://localhost:8000/admin/extensions/configure/app>.

![Migrate and Publish](/blogs/assets/2013/06/migrate-and-publish.png)

Let's check our database again and see if anything has changed:

	mysql> SELECT `value` FROM `orchestra_options` WHERE `name`='acl_playground';
	+---------------------------------------------------------------------------+
	| value                                                                     |
	+---------------------------------------------------------------------------+
	| a:3:{s:7:"actions";a:4:{i:0;s:12:"view-article";i:1;s:9:"view-page";i:2;s:14:"manage-article";i:3;s:11:"manage-page";}s:5:"roles";a:3:{i:0;s:5:"guest";i:1;s:13:"administrator";i:2;s:6:"member";}s:3:"acl";a:8:{s:3:"1:0";b:1;s:3:"1:1";b:1;s:3:"1:2";b:1;s:3:"1:3";b:1;s:3:"0:0";b:1;s:3:"0:1";b:1;s:3:"2:0";b:1;s:3:"2:1";b:1;}}                        |
	+---------------------------------------------------------------------------+
	1 row in set (0.00 sec)

As you would see, we do have successfully populated our ACL (you might need sometime to understand the structure), but let's not worry about it and allow `Orchestra\Acl` to do it's magic.

## What's Next?

Next we going to look at creating resources to manage articles and pages from Orchestra Platform Administrator Interface. 

[Continue reading Part 4](/blogs/2013/06/02/simple-website-4).