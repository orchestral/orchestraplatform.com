---
title: Messages Component
badge: messages

---

Messages Component bring a unified notification support for Laravel and Orchestra Platform.

1. [Version Compatibility](#compatibility)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Usage](#usage)
  - [Adding a Message](#adding-a-message)
  - [Extending a Message to Current Request](#extending-a-message-to-current-request)
  - [Displaying the Message in a View](#displaying-the-message-in-a-view)
5. [Change Log]({doc-url}/components/messages/changes#v3-0)

<a name="compatibility"></a>
## Version Compatibility

Laravel    | Messages
:----------|:----------
 4.2.x     | 2.2.x
 5.0.x     | 3.0.x

<a name="installation"></a>
## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "orchestra/messages": "~3.0"
    }
}
```

And then run `composer install` from the terminal.

<a name="quick-installation"></a>
### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/messages=~3.0"

<a name="configuration"></a>
## Configuration

Add `Orchestra\Messages\MessagesServiceProvider` service provider in `config/app.php`.

```php
'providers' => [

    // ...

    'Orchestra\Messages\MessagesServiceProvider',
],
```

### Aliases

You might want to add `Orchestra\Support\Facades\Messages` to class aliases in `config/app.php`:

```php
'aliases' => [

    // ...

    'Messages' => 'Orchestra\Support\Facades\Messages',
],
```

<a name="usage"></a>
## Usage

1. [Adding a Message](#adding-a-message)
2. [Extending a Message to Current Request](#extending-a-message-to-current-request)
3. [Displaying the Message in a View](#displaying-the-message-in-a-view)

<a name="adding-a-message"></a>
### Adding a Message

Adding a message is as easy as following:

```php
Messages::add('success', 'A successful message');
```

You can also chain messages:

```php
Messages::add('success', 'A successful message')
    ->add('error', 'Some error');
```

<a name="extending-a-message-to-current-request"></a>
### Extending a Message to Current Request

There might be situation where you need to extend a message to the current response instead of the following request. You can do this with:

```php
Messages::extend(function ($message) {
    $message->add('info', 'Read-only mode');
});
```

<a name="displaying-the-message-in-a-view"></a>
### Displaying the Message in a View

Here's an example how you can display the message:

```php
<?php

$message = Messages::retrieve();

if ($message instanceof Orchestra\Messages\MessageBag) {
    $message->setFormat('<div class="alert alert-:key">:message</div>');

    foreach (['error', 'info', 'success'] as $key) {
        if ($message->has($key)) {
            echo implode('', $message->get($key));
        }
    }
}
```
