---
title: Messages Component

---

Messages Component bring a unified notification support for Laravel 4 and Orchestra Platform 2.

## Table of Content

* [Version Compatibility](#compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
  - [Adding a Message](#adding-a-message)
  - [Extending a Message to Current Request](#extending-a-message-to-current-request)
  - [Displaying the Message in a View](#displaying-the-message-in-a-view)
* [Change Log](http://orchestraplatform.com/docs/latest/components/messages/changes#v2-3)
* [Github](https://github.com/orchestral/messages)

## Version Compatibility {#compatibility}

Laravel    | Messages
:----------|:----------
 4.2.x     | 2.2.x

## Installation {#installation}

To install through composer, simply put the following in your `composer.json` file:

    {
        "require": {
            "orchestra/messages": "2.2.*"
        }
    }

And then run `composer install` from the terminal.

### Quick Installation

Above installation can also be simplify by using the following command:

    composer require "orchestra/messages=2.2.*"

## Configuration {#configuration}

Add `Orchestra\Messages\MessagesServiceProvider` service provider in `app/config/app.php`.

    'providers' => array(

        // ...

        'Orchestra\Messages\MessagesServiceProvider',
    ),

### Aliases

You might want to add `Orchestra\Messages\Facade` to class aliases in `app/config/app.php`:

    'aliases' => array(

        // ...

        'Orchestra\Messages' => 'Orchestra\Messages\Facade',
    ),

## Usage {#usage}

### Adding a Message {#adding-a-message}

Adding a message is as easy as following:

    Orchestra\Messages::add('success', 'A successful message');

You can also chain messages:

    Orchestra\Messages::add('success', 'A successful message')
        ->add('error', 'Some error');

### Extending a Message to Current Request {#extending-a-message-to-current-request}

There might be situation where you need to extend a message to the current response instead of the following request. You can do this with:

    Orchestra\Messages::extend(function ($message) {
        $message->add('info', 'Read-only mode');
    });

### Displaying the Message in a View {#displaying-the-message-in-a-view}

Here's an example how you can display the message:

    <?php

    $message = Orchestra\Messages::retrieve();

    if ($message instanceof Orchestra\Messages\MessageBag) {
        foreach (['error', 'info', 'success'] as $key) {
            if ($message->has($key)) {
                $message->setFormat(
                    '<div class="alert alert-'.$key.'">:message</div>'
                );
                echo implode('', $message->get($key));
            }
        }
    }
