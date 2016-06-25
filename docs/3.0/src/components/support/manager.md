---
title: Using Manager

---

`Orchestra\Support\Manager` is a small improvement to `Illuminate\Support\Manager`, which allow multi-ton driver based factory design pattern for your class.

## Use Case

While in most cases you would not need to use multi-instance of the same driver there are a few use case that require this functionality especially [Memory]({doc-url}/components/memory) and [Widget]({doc-url}/components/widget) component.

### Example of Orchestra\Widget\WidgetManager

With following `Orchestra\Widget\WidgetManager`, it's possible to have an instance of `Widget::make("menu.orchestra")` and `Widget::make("menu.app")` without a conflict.

```php
<?php namespace Orchestra\Widget;

use Closure;
use InvalidArgumentException;
use Orchestra\Support\Manager;

class WidgetManager extends Manager {

	/**
	 * Define blacklisted character in name.
	 *
	 * @var
	 */
	protected $blacklisted = array();

	/**
	 * Create Menu driver.
	 *
	 * @param  string   $name
	 * @return \Orchestra\Widget\Drivers\Menu
	 */
	protected function createMenuDriver($name)
	{
		return new Drivers\Menu($this->app, $name);
	}

	/**
	 * Create Pane driver.
	 *
	 * @param  string   $name
	 * @return \Orchestra\Widget\Drivers\Pane
	 */
	protected function createPaneDriver($name)
	{
		return new Drivers\Pane($this->app, $name);
	}

	/**
	 * Create Placeholder driver.
	 *
	 * @param  string   $name
	 * @return \Orchestra\Widget\Drivers\Placeholder
	 */
	protected function createPlaceholderDriver($name)
	{
		return new Drivers\Placeholder($this->app, $name);
	}

	/**
	 * Create default driver.
	 *
	 * @param  string   $name
	 * @return string
	 */
	protected function getDefaultDriver()
	{
		return 'placeholder.default';
	}
}
```
