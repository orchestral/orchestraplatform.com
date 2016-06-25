---
title: Authorization Component
badge: authorization

---

Authorization Component gives you the ability to create custom ACL metrics which is unique to each of your extension/application. The component works best with [Auth Component]({doc-url}/components/auth) but you could as well implements `Orchestra\Contracts\Auth\Guard`.

In most other solutions, you are either restrict to file based configuration for ACL or only allow to define a single metric for your entire application. This simplicity would later become an issue depends on how many extensions do you have within your application.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
  - [Concept of RBAC](#concept-of-rbac)
  - [Creating a New ACL Instance](#creating-a-new-acl-instance)
  - [Verifying the ACL](#verifying-the-acl)
  - [Integration with Memory Component](#memory-integration)
5. [Change Log]({doc-url}/components/auth/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

Laravel    | Authorization
:----------|:----------
 5.0.x     | 3.0.x

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "orchestra/authorization": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/authorization=~3.0"

<a name="configuration"></a>
## Configuration

Next add the service provider in `config/app.php`.

```php
'providers' => [

    // ...
    'Orchestra\Authorization\AuthorizationServiceProvider',
    'Orchestra\Memory\MemoryServiceProvider',

    'Orchestra\Memory\CommandServiceProvider',
],
```

### Aliases

To make development easier, you could add `Orchestra\Support\Facades\ACL` alias for easier reference:

```php
'aliases' => [

    'ACL' => 'Orchestra\Support\Facades\ACL',

],
```

<a name="usage"></a>
## Usage

1. [Concept of RBAC](#concept-of-rbac)
2. [Creating a New ACL Instance](#creating-a-new-acl-instance)
3. [Verifying the ACL](#verifying-the-acl)
4. [Integration with Memory Component](#memory-integration)

<a name="concept-of-rbac"></a>
### Concept of RBAC

Name     | Description
:--------|:-----------------------
actions  | Actions is either route or activity that we as a user can do (or not do).
roles    | Roles are user group that a user can belong to.
acl      | Is a boolean mapping between actions and roles, which determine whether a role is allow to do an action.

<a name="creating-a-new-acl-instance"></a>
### Creating a New ACL Instance

```php
<?php

$acl = ACL::make('acme');
```

Imagine we have a **acme** extension, above configuration is all you need in your extension/application service provider.

<a name="verifying-the-acl"></a>
### Verifying the ACL

To verify the created ACL, you can use the following code.

```php
$acl = ACL::make('acme');

if (! $acl->can('manage acme')) {
    return redirect()->to(handles('orchestra::login'));
}
```

Or you can create a route middleware.

```php
<?php namespace Acme\Http\Middleware;

use Closure;
use Orchestra\Support\Facades\ACL;

class ManageAcme
{
    public function handle($request, Closure $next)
    {
        if (! ACL::make('acme')->can('manage acme')) {
            return redirect()->to(handles('orchestra::login'));
        }

        return $next($request);
    }
}
```

<a name="memory-integration"></a>
### Integration with Memory Component

Integration with [Memory Component]({doc-url}/components/memory}) would allow a persistent storage of ACL metric, this would eliminate the need to define ACL on every request.

#### Creating a New ACL Instance

```php
<?php

ACL::make('acme')->attach(Memory::make());
```

#### Migration Example

Since an ACL metric is defined for each extension, it is best to define ACL actions using a migration file.

```php
<?php

use Orchestra\Model\Role;
use Illuminate\Database\Migrations\Migration;

class FooDefineAcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::admin();
        $acl  = ACL::make('acme');

        $actions = ['manage acme', 'view acme'];

        $acl->actions()->attach($actions);
        $acl->roles()->add($role->name);

        $acl->allow($role->name, $actions);

        Memory::finish();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // nothing to do here.
    }
}
```
