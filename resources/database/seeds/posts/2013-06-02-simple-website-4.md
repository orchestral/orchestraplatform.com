---
layout: single-blog
title: Simple Website with Orchestra Platform 2 (Part 4)
lead: Defining Resource Using Restful Controller
author:
  name: crynobone
  url: https://github.com/crynobone

---

Time to finally dive in an create resources on Orchestra Platform, basically resource are mapping between Orchestra Platform routing to catch request that should be managed by individual extension within the administration interface, if you missed the previous chapter it's available at
[Simple Website with Orchestra Platform 2 (Part 3)](/blogs/2013/06/01/simple-website-3).

## Adding a Resource

To start things off, lets open up `app/orchestra.php` and append the following:

	<?php

	Orchestra\Acl::make('playground')->attach(Orchestra\App::memory());

	Event::listen('orchestra.started: admin', function ()
	{
		$playground = Orchestra\Resources::make('playground', [
			'name' => 'Playground',
			'uses' => 'restful:AdminHomeController',
		]);
	});

So what did we accomplish with this little code, we can see that it has `'uses' => 'restful:AdminHomeController'`, so lets add this controller first in `app/controllers/admin/HomeController.php`.

	<?php

	class AdminHomeController extends BaseController {

		public function getIndex()
		{
			return '<h1>We are in Playground</h1>';
		}
	}

Don't forget to run dump autoload:

	$ composer dump-autoload

	Generating autoload files

Now let's open up Orchestra Platform <http://localhost:8000/admin> and browse to **Resources** > **Playground**.

![Basic Resources](/uploads/2013/06/basic-resources.png)

How cool is that? For extra fun lets create a `getUser` action that would return as a JSON.

	<?php

	class AdminHomeController extends BaseController {

		public function getIndex()
		{
			return '<h1>We are in Playground</h1>';
		}

		public function getUser()
		{
			return User::all();
		}
	}

Now we hit <http://localhost:8000/admin/resources/playground/user> and what do we get?

	[{"id":"1","email":"crynobone@gmail.com","fullname":"Mior Muhammad Zaki","status":"1","created_at":"2013-06-02 06:25:54","updated_at":"2013-06-02 06:27:10","deleted_at":null}]

Just as expected. We're definitely getting somewhere, but if you have additional user account (none Administrator), you'll find that this user can view the page as well, which is not what we would expect it to be, let's fix this.

## Adding Authorization to Resources

First let's not display the menu if the user doesn't have access to the resource. To do this let's revisit our `app/orchestra.php` and add `visibility` option.

	<?php

	Orchestra\Acl::make('playground')->attach(Orchestra\App::memory());

	Event::listen('orchestra.started: admin', function ()
	{
		$playground = Orchestra\Resources::make('playground', [
			'name'    => 'Playground',
			'uses'    => 'restful:AdminHomeController',
			'visible' => function ()
			{
				$acl = Orchestra\Acl::make('playground');

				return ($acl->can('manage article') or $acl->can('manage page'));
			},
		]);
	});

Here we're adding an acl checking before we actually allow the menu to be display, I believe `return ($acl->can('manage article') or $acl->can('manage page'));` speak for itself.

### Adding Filter to Controller

This isn't something new in Orchestra Platform, but as a guide I'll show you how to do it.

	<?php

	class AdminHomeController extends BaseController {

		public function __construct()
		{
			$this->beforeFilter(function ()
			{
				$acl = Orchestra\Acl::make('playground');

				if ( ! ($acl->can('manage article') or $acl->can('manage page')))
				{
					return Redirect::to(handles('orchestra/foundation::/'));
				}
			});
		}

		public function getIndex()
		{
			return '<h1>We are in Playground</h1>';
		}

		public function getUser()
		{
			return User::all();
		}
	}


## What's Next

Next we going to look into using [Resource Controllers](http://laravel.com/docs/controllers#resource-controllers) with `Orchestra\Resources`.

[Continue reading Part 5](/blogs/2013/06/12/simple-website-5).
