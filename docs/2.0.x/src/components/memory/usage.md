---
title: Using Memory

---

* [Creating Instance](#create-instance)
* [Storing Items](#storing-items)
* [Retrieving Items](#retrieving-items)
* [Removing Items](#removing-items)
* [Extending Memory](#extending-memory)

## Creating Instance {#create-instance}

Below are list of possible ways to use `Orchestra\Memory`:

	$runtime  = Orchestra\Memory::make('runtime');
	$fluent   = Orchestra\Memory::make('fluent');
	$eloquent = Orchestra\Memory::make('eloquent');
	$cache    = Orchestra\Memory::make('cache');

However, most of the time you wouldn't need to have additional memory instance other than the default which is using `orchestra_options` table.

	$memory = Orchestra\Memory::make();

> When using with Orchestra Platform, `Orchestra\Memory::make()` would be used throughout the application.

## Storing Items {#storing-items}

Storing items in the `Orchestra\Memory` is simple. Simply call the put method:

	$memory->put('site.author', 'Taylor');

	// or you can also use
	Orchestra\Memory::put('site.author', 'Taylor');


The first parameter is the **key** to the config item. You will use this key to retrieve the item from the config. The second parameter is the **value** of the item.

## Retrieving Items {#retrieving-items}

Retrieving items from `Orchestra\Memory` is even more simple than storing them. It is done using the get method. Just mention the key of the item you wish to retrieve:

	$name = $memory->get('site.author');

	// or you can also use
	$name = Orchestra\Memory::get('site.author');

By default, `NULL` will be returned if the item does not exist. However, you may pass a different default value as a second parameter to the method:

	$name = $memory->get('site.author', 'Fred');

Now, "Fred" will be returned if the "site.author" item does not exist.

## Removing Items {#removing-items}

Need to get rid of an item? No problem. Just mention the name of the item to the forget method:

	$memory->forget('site.author');

	// or you can also use
	Orchestra\Memory::forget('site.author');

## Extending Memory {#extending-memory}

There might be requirement that a different type of storage engine would be use for memory instance, you can extending it by adding your own driver.

	class ExampleDriver extends Orchestra\Memory\Drivers\Driver
	{
		// Add your implementation
	}

	Orchestra\Memory::extend('example', function ($app, $name) {
		return new ExampleDriver($app, $name);
	});

	// Now you can use it as
	$example = Orchestra\Memory::make('example.default');
