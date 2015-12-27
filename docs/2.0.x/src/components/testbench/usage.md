---
title: Using Testbench

---

* [Basic Usage](#basic-usage)
* [Testing Route Filters](#testing-route-filters)
* [Working with Workbench](#working-with-workbench)

## Basic Usage {#basic-usage}

To use `Orchestra\Testbench`, all you need to do is extend `Orchestra\Testbench\TestCase` instead of `PHPUnit_Framework_TestCase`. The fixture `app` booted by `Orchestra\Testbench\TestCase` is predefined to follow the base application skeleton of Laravel 4.

	<?php

	class TestCase extends Orchestra\Testbench\TestCase {}

### Custom Service Provider

To load your package service provider, override the `getPackageProviders`.

	protected function getPackageProviders()
	{
		return array('Acme\AcmeServiceProvider');
	}

### Custom Aliases

To load your package alias, override the `getPackageAliases`.

	protected function getPackageAliases()
	{
		return array(
			'Acme' => 'Acme\Facade'
		);
	}

### Overriding setUp() method

Since `Orchestral\TestCase` overrides Laravel's `TestCase`, if you need your own `setUp()` implementation, do not forget to call `parent::setUp()`:

    public function setUp()
    {
        parent::setUp();

        // Your code here
    }

## Testing Route Filters {#testing-route-filters}

By default, route filters are disabled by Laravel because, ideally, you should test the filter separately. In order to overwrite this default, add the following code:

	$this->app['router']->enableFilters();

## Working with Workbench {#working-with-workbench}

> Fatal error: Class 'Illuminate\Foundation\Testing\TestCase' not found in /laravel/workbench/foo/bar/vendor/orchestra/testbench/src/Orchestra/Testbench/TestCase.php

Due to the requirement to include `laravel/framework` when you install `orchestra/testbench`, please remove any **Illuminate** dependencies to avoid a failed installation.
