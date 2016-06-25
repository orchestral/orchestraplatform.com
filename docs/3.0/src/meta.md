---
title: Meta Data

---

Meta data are configuration information that are only available on current request. It similar to Laravel configuration repository but without the persistent information. This make it useful for adding information that is specific to the current request.

1. [Basic Usage](#basic-usage)
2. [Using Helpers](#using-helpers)
3. [Using Blade Directives](#using-blade-directives)

<a name="basic-usage"></a>
## Basic Usage

A common usage of meta data is to define current page title:

```php
Meta::set('title', 'Welcome');
```

This value can be retrieved via `Meta::get()`:

```php
echo Meta::get('title');
```
<a name="using-helpers"></a>
## Using Helpers

Set a meta data:

```php
set_meta('title', 'Welcome');
```

Get a meta data (this will `return` the value):

```php
echo get_meta('title');
```

<a name="using-blade-directives"></a>
## Using Blade Directives

Set a meta data:

```html
@set_meta('title', 'Welcome')
```

Get a meta data (this will `echo` the value):

```html
@get_meta('title')
```
