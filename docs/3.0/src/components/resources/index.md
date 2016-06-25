---
title: Resources Component
badge: resources

---

Resources component is an adhoc routing manager that allow extension developer to add CRUD interface without touching Orchestra Platform.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
5. [Change Log]({doc-url}/components/resources/changes#v3-0)

Laravel    | Facile
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
        "orchestra/resources": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/resources=~3.0"

<a name="configuration"></a>
## Configuration

Next add the service provider in `config/app.php`.

```php
'providers' => [

    // ...

    'Orchestra\Resources\ResourcesServiceProvider',
],
```

### Aliases

To make development easier, you could add `Orchestra\Support\Facades\Resources` alias for easier reference:

```php
'aliases' => [

    'Resources' => 'Orchestra\Support\Facades\Resources',

],
```

<a name="usage"></a>
## Usage

Resources component offer more control to developer to create application on top of Orchestra Platform Administrator Interface. The idea is to allow controllers to be map to specific URL in Orchestra Platform Administrator Interface.

* [Adding a Resource](#adding-a-resource)
* [Adding a Child Resource](#adding-a-child-resource)
* [Returning Response from a Resource](#returning-response-from-a-resource)

<a name="adding-a-resource"></a>
## Adding a Resource

Normally we would identify an extension to a resource for ease of use, however Orchestra Platform still allow a single extension to register multiple resources if such requirement is needed.

```php
Event::listen('orchestra.started: admin', function () {
    $robots = Resources::make('robotix', [
        'name'    => 'Robots.txt',
        'uses'    => 'Robotix\ApiController',
        'visible' => function () {
            return (Foundation::acl()->can('manage orchestra'));
        },
    ]);
});
```

Name     | Usage
:--------|:-------------------------------------------------------
name     | A name or title to refer to the resource.
uses     | a path to controller, you can prefix with either `restful:` (default) or `resource:` to indicate how Orchestra Platform should handle the controller.
visible  | Choose whether to include the resource to Orchestra Platform Administrator Interface menu.

Orchestra Platform Administrator Interface now would display a new tab next to Extension, and you can now navigate to available resources.

<a name="adding-a-child-resource"></a>
## Adding a Child Resource

A single resource might require multiple actions (or controllers), we allow such feature to be used by assigning child resources.

```php
$robots->route('pages', 'resource:Robotix\PagesController');
```

Nested resource controller is also supported:

```php
$robots['pages.comments'] = 'resource:Robotix\Pages\CommentController';
```

<a name="returning-response-from-a-resource"></a>
## Returning Response from a Resource

Controllers mapped as Orchestra Platform Resources is no different from any other controller except the layout is using Orchestra Platform Administrator Interface. You can use `View`, `Response` and `Redirect` normally as you would without Orchestra Platform integration.

