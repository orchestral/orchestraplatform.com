---
title: Widget Component
badge: widget

---

Widget allow you to manage widgetize actions in Orchestra Platform. By default Orchestra Platform provides the following widgets:

1. [Version Compatibility](#compatibility)
3. [Installation](#installation)
4. [Configuration](#configuration)
2. [Type of Widgets](#type)
5. [Change Log]({doc-url}/components/widget/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

 Laravel  | Widget
:---------|:----------
 4.0.x    | 2.0.x
 4.1.x    | 2.1.x
 4.2.x    | 2.2.x
 5.0.x    | 3.0.x

<a name="Installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "orchestra/widget": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/widget=~3.0"

<a name="configuration"></a>
## Configuration

Next add the service provider in `config/app.php`.

```php
'providers' => [

    // ...

    'Orchestra\Widget\WidgetServiceProvider',
],
```

<a name="type"></a>
## Type of Widgets

* **Menu** to manage menu.
* **Pane** to manage dashboard items.
* **Placeholder** to manage sidebar widgets.

