---
title: Facades

---

1. [Introduction](#introduction)
2. [Class Reference](#class-reference)

<a name="introduction"></a>
## Introduction

Facades provide a "static" interface to classes that are available in the application's IoC container. Orchestra Platform ships with many facades, and you have probably been using them without even knowing it! Orchestra Platform "facades" serve as "static proxies" to underlying classes in the IoC container, providing the benefit of a terse, expressive syntax while maintaining more testability and flexibility than traditional static methods.

Occasionally, you may wish to create your own facades for your application's and packages, so let's explore the concept, development and usage of these classes.

<a name="class-reference"></a>
## Class Reference

List of available facades on Orchestra Platform.

Alias                 | Facade                                 | Root Accessor                                     | Service Location
:---------------------|:---------------------------------------|:--------------------------------------------------|:----------------------
`ACL`                 | `Orchestra\Support\Facades\ACL`        | `Orchestra\Authorization\Factory`                 | `orchestra.acl`
`Asset`               | `Orchestra\Support\Facades\Asset`      | `Orchestra\Asset\Factory`                         | `orchestra.asset`
`Orchestra\Config`    | `Orchestra\Support\Facades\Config`     | `Orchestra\Extension\Config\Repository`           | `orchestra.extension.config`
-                     | `Orchestra\Support\Facades\Decorator`  | `Orchestra\View\Decorator`                        | `orchestra.decorator`
`Orchestra\Extension` | `Orchestra\Support\Facades\Extension`  | `Orchestra\Extension\Factory`                     | `orchestra.extension`
`Form`                | `Orchestra\Support\Facades\Form`       | `Orchestra\Html\Form\Factory`                     | `orchestra.form`
`Foundation`          | `Orchestra\Support\Facades\Foundation` | `Orchestra\Foundation\Foundation`                 | `orchestra.app`
`HTML`                | `Orchestra\Support\Facades\HTML`       | `Orchestra\Html\HtmlBuilder`                      | `html`
`Orchestra\Mail`      | `Orchestra\Support\Facades\Mail`       | `Orchestra\Notifier\Mailer`                       | `orchestra.mail`
`Memory`              | `Orchestra\Support\Facades\Memory`     | `Orchestra\Memory\MemoryManager`                  | `orchestra.memory`
`Messages`            | `Orchestra\Support\Facades\Messages`   | `Orchestra\Messages\MessageBag`                   | `orchestra.messages`
`Meta`                | `Orchestra\Support\Facades\Meta`       | `Orchestra\Foundation\Meta`                       | `orchestra.meta`
`Notifier`            | `Orchestra\Support\Facades\Notifier`   | `Orchestra\Notifier\NotifierManager`              | `orchestra.notifier`
`Orchestra\Publisher` | `Orchestra\Support\Facades\Publisher`  | `Orchestra\Foundation\Publisher\PublisherManager` | `orchestra.publisher`
`Table`               | `Orchestra\Support\Facades\Table`      | `Orchestra\Html\Table\Factory`                    | `orchestra.table`
`Theme`               | `Orchestra\Support\Facades\Theme`      | `Orchestra\View\Theme\ThemeManager`               | `orchestra.theme`
`Orchestra\Widget`    | `Orchestra\Support\Facades\Widget`     | `Orchestra\Widget\WidgetManager`                  | `orchestra.widget`
