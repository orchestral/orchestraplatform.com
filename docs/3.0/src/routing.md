---
title: Routing

---

1. [Registering Routes](#registering-routes)
   - [Frontend Routing](#frontend-routing)
   - [Backend Routing](#backend-routing)
2. [Generating URL](#generating-url)

<a name="registering-routes"></a>
## Registering Routes

Routing with Orchestra Platform is still based on Laravel routing engine. However we include two base method for registering routes; `Foundation::namespaced()` and `Foundation::group()`.

<a name="frontend-routing"></a>
### Frontend Routing

Anything other than Orchestra Platform administration routes are considered as frontend routing, this includes routing to frontend for app and extensions.

```php
use Illuminate\Routing\Router;

Foundation::group('app', '/', ['namespace' => 'App\Http\Controllers'], function (Router $router) {
    $router->resources('photos', 'PhotoController', ['only' => ['index', 'show']]);
});
```

The main different is that we now include a namespace and a fallback prefix before providing any attributes for our route group. In this case `app` is our route namespace and `/` is the fallback prefix URL if `app` path is not registered.

The reason namespace is important because using this concept we can set an anchor to the URL via the following:

```html
<a href="{{ handles('app::photos') }}">List Photos</a>
```

<a name="backend-routing"></a>
### Backend Routing

You can easily create a new page for Orchestra Platform administration routes by using `Foundation::namespaced()`:

```php
use Illuminate\Routing\Router;

Foundation::namespaced('App\Http\Controllers\Admin', function (Router $router) {
    $router->resource('photos', 'PhotoController');
});
```

Above code improves the basic `Route::group()` by adding few things:

* Set the proper `prefix` or `domain` path for Orchestra Platform administration page.
* Add `Orchestra\Foundation\Http\Middleware\UseBackendTheme` middleware.
* Add route group namespace to `App\Http\Controllers\Admin`.

It's actually an alias of `Foundation::group()` with additional configuration, above code is actually an equivalent of using `Foundation::group()` as the following:

```php
use Illuminate\Routing\Router;

Foundation::group('orchestra/foundation', 'admin', ['middleware' => 'Orchestra\Foundation\Http\Middleware\UseBackendTheme', 'namespace' => 'App\Http\Controllers\Admin'], function (Router $router) {
    $router->resource('photos', 'PhotoController');
});
```


<a name="generating-url"></a>
## Generating URL

In order to make the routing configurable we have merged `route()`, `action()` and `url()` to a single `Foundation::handles()` method.
