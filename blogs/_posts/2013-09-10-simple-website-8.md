---
layout: single-blog
title: Simple Website with Orchestra Platform 2 (Part 8)
lead: Extending the Default User Model
author:
  name: coreymcmahon
  url: https://github.com/coreymcmahon
  
 
---

In this tutorial we'll look at how to build on the default features and behaviour of the Orchestra Platform by extending the user model. To achieve this we'll leverage the event-driven nature of Laravel.

The Orchestra Platform provides a basic schema definition for the user model, which you can see in the migration step below:

	<?php
		/**
		 * Excerpt from '/vendor/orchestra/auth/src/migrations/{$timestamp}_orchestra_auth_create_users_table.php'
		 */
		Schema::create('users', function($table) 
		{
			$table->increments('id');

			$table->string('email', 100);
			$table->string('password', 60);

			/* ..etc...*/

			$table->string('fullname', 100)->nullable();
			$table->integer('status')->nullable();

			$table->timestamps();
			$table->softDeletes();

			$table->unique('email');
		});

While this is sufficient for the purposes of authentication and authorization, for most projects we will want to store additional information about users. Examples of such information may include things like usernames, phone numbers, addresses and so forth. This raises an important question: how can we extend the default user schema?


## An Initial Solution: User Profiles table ##
One solution is to create a new table and an associated [Orchestra Resource](/docs/2.0/components/resources/). The new table would contain the new fields, one of which would be a foreign key associating each row with an entry in the **users** table. We could then create a [CRUD](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete) interface using the routing scheme provided by the resource definition. For more details on creating and using resources, see [Part 4](/blogs/2013/06/02/simple-website-4/) of the getting started tutorial. 

While this method will work, there are some problems with this approach.

* We will need to maintain two separate domain objects (two database rows and two model objects) for what should really be represented by a single object.

* When working with the model object, instead of fetching attributes directly from the ```User``` model, we'll need to do something like this: ```$user->user_profile->phoneNumber```

* We will have two separate pages for managing **Users** and the **User Profile Resource** in the Orchestra backend.


## A Better Solution: Extending Orchestra ##
Another approach would be to add fields to the **users** table created by Orchestra, and then modify the default behaviour for creating and updating users so that the new fields are displayed and editable. Luckily Orchestra provides us with the ability to hook into the default behaviours and modify them as required using events.

For the purposes of illustation we'll consider the case where we want to add a contact phone number and address to our user records.


## Adding the columns to the database ##
The first step is to update the **users** table definition with the new columns. When the Orchestra Platform is first installed, it will attempt to load the following file: ```app/orchestra/installer.php```. We can use this file to define event handlers that are executed at different stages of the install process.

Relevant to our scenario is the ```orchestra.install.schema``` event, which is fired during the migration step which is responsible for creating the **users** table. We can add an event handler that extends the table definition before it's committed to the database. Here's what it looks like for our scenario:

	<?php
	// Add this to app/orchestra/installer.php
	Event::listen('orchestra.install.schema: users', function ($table)
	{
		$table->string('address1', 64)->nullable();
		$table->string('address2', 64)->nullable();
		$table->string('address3', 64)->nullable();
		$table->string('postcode', 16)->nullable();
		$table->string('telephone', 24)->nullable();
	});

After adding this file, we can then complete the Orchestra Platform install process, open up a MySQL session and run ```DESCRIBE USERS;```:

	+------------+------------------+------+-----+---------------------+----------------+
	| Field      | Type             | Null | Key | Default             | Extra          |
	+------------+------------------+------+-----+---------------------+----------------+
	| id         | int(10) unsigned | NO   | PRI | NULL                | auto_increment |
	| email      | varchar(100)     | NO   | UNI | NULL                |                |
	| password   | varchar(60)      | NO   |     | NULL                |                |
	| address1   | varchar(64)      | YES  |     | NULL                |                |
	| address2   | varchar(64)      | YES  |     | NULL                |                |
	| address3   | varchar(64)      | YES  |     | NULL                |                |
	| postcode   | varchar(16)      | YES  |     | NULL                |                |
	| telephone  | varchar(24)      | YES  |     | NULL                |                |
	| status     | int(11)          | YES  |     | NULL                |                |
	| created_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
	| updated_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
	| deleted_at | timestamp        | YES  |     | NULL                |                |
	+------------+------------------+------+-----+---------------------+----------------+
	12 rows in set (0.01 sec)

Great! So we've successfully extended the `users` table. 

But we're not there yet: if we open the Orchestra backend and click on the 'Users' link in the top navigation ( http://localhost:8000/admin/users ) we can see that the new fields don't appear in the form for adding and editing users:

![Edit users](/blogs/assets/2013/09/lesson-08-edit.png)


## Extending the Orchestra Backend ##

From [Part 3](/blogs/2013/06/01/simple-website-3/) you'll remember that we can define a start file in ```app/orchestra.php``` that will be loaded by the Orchestra Platform on each request. You'll also recall that we can define handlers in this file that hook into events throughout the application lifecycle and extend or change the default behaviour.

The Orchestra Platform fires events during all stages of the user management process. By hooking into these, we can modify the behaviour so that our new columns are displayed and editable from the Orchestra backend.

The specific events that we'll be interested in listening for are:

* **orchestra.list: users**: occurs when listing users on the ```admin/users``` page.
* **orchestra.form: users**: occurs when rendering the form for adding or updating users.
* **orchestra.validate: users**: fires before form validation.
* **orchestra.saving: users**: fires before saving when creating a new user or updating an existing one.

So for our scenario, the event handlers will be:

	<?php 
	// Add this to app/orchestra.php
	Event::listen('orchestra.started: admin', function ()
	{
		// List the phone number on the user list page
		Event::listen('orchestra.list: users', function ($model, $table)
		{
			$table->extend(function ($table)
			{
				$table->column('Phone', function ($column)
				{
					$column->value(function ($row)
					{
						return "{$row->telephone}";
					});
				});
			});
		});

		// Extend the form with the new fields
		Event::listen('orchestra.form: users', function ($model, $form)
		{
			$form->extend(function ($form)
			{
				$form->fieldset('Profile', function ($fieldset)
				{
					$fieldset->control('input:text', 'Address 1', 'address1');
					$fieldset->control('input:text', 'Address 2', 'address2');
					$fieldset->control('input:text', 'Address 3', 'address3');
					$fieldset->control('input:text', 'Postcode', 'postcode');
					$fieldset->control('input:text', 'Phone number', 'telephone');
				});
			});
		});

		// Add our validation rules for the new fields
		Event::listen('orchestra.validate: users', function ($rules)
		{
			$rules['address1'] = array('between:0,64');
			$rules['address2'] = array('between:0,64');
			$rules['address3'] = array('between:0,64');
			$rules['postcode'] = array('between:0,16');
			$rules['telephone'] = array('alpha_dash', 'between:0,24');
		});
		
		// Add the new values to the model object before saving
		Event::listen('orchestra.saving: users', function ($user)
		{
			$user->address1 = Input::get('address1');
			$user->address2 = Input::get('address2');
			$user->address3 = Input::get('address3');
			$user->postcode = Input::get('postcode');
			$user->telephone = Input::get('telephone');
		});
	});

Note that we can use ```user.account``` in place of ```users``` in the event names above if we want the user to also have the ability to view and edit these fields - for example, ```orchestra.saving: users``` becomes ```orchestra.saving: user.account```. If we listen for the ```users``` events instead (as demonstrated above), only Administrators will be able to see and use the new fields. 

And that's it!

If you navigate to the Users page in the Orchestra backend, you'll notice that when adding or editing a user record, the new fields will be listed:

![Edit users](/blogs/assets/2013/09/lesson-08-edit-02.png)

Also note that the 'Phone' field is now included on the list users page:

![List users](/blogs/assets/2013/09/lesson-08-users.png)


