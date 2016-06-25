---
title: Introduction

---

1. [What is Orchestra Platform?](#what)
2. [What Makes Orchestra Platform Different?](#what-different)
3. [Illuminating Orchestra Platform](#illuminate)
4. [Version Compatibility](#version-compatibility)

<a name="what"></a>
## What is Orchestra Platform?

Provide a solid base off of which to build your new web applications. It's not a CMS. Instead, it's a springboard to build off of with many of the tools you wish you had on projects but never took the time to build.

Have you had a client that wanted you to create a custom application but at the same time they're also looking to have a robust Content Management System within that same application? If you answered yes, what are your options?

* To build the application on top of WordPress (or other CMS system that you're familiar with).
* To build the application using your favourite language and framework while also integrating your own custom-built CMS components in it hoping that it's easy for your clients to use (just like how they were to use WordPress easily!)
* Or try to integrate both (which you know would be a bad idea from the start).

Orchestra Platform will solve this problem by creating a similar Administration Panel as you would see in WordPress *wp-admin*, so you can continue writing awesome code in Laravel but at the same time have CMS components ready at your disposal.

<a name="what-different"></a>
## What Makes Orchestra Platform Different?

* **Laravel Framework 5** is simply a great framework to work with.
* **Extensions** are a much needed improvement to package implementation in Laravel. With one click activation and upgrade (migration and publish).
* **Database Based Configuration** for any extensions are a solid replacement of file based configuration, stop telling your non-technical client to edit PHP file for any simple configuration changes.
* **Resources** lets you build HMVC implementation on top of Orchestra Platform. Hook your backend application to Orchestra with just simple API.
* **ACL and User Management** are repetitive boilerplate module on every projects, lets stop reinventing the wheel and let Orchestra Platform do its magic. If you need something more advanced, there are more than 20 events that you can hook into your own implementation without overwriting Orchestra Platform core file.
* **Responsive Design** is always available when you're on mobile.

<a name="illuminate"></a>
## Illuminating Orchestra Platform

With the introduction of Composer, we are now free to organize the code into smaller component where there would be use-case where you can use one or two Orchestra Platform components without everything else. At this moment we have organize the code into following components:

* [Asset]({doc-url}/components/asset)
* [Auth]({doc-url}/components/auth)
* [Extension]({doc-url}/components/extension)
* [Kernel]({doc-url}/components/kernel)
* [Foundation]({doc-url}/components/foundation)
* [Html]({doc-url}/components/html)
* [Memory]({doc-url}/components/memory)
* [Messages]({doc-url}/components/messages)
* [Model]({doc-url}/components/model)
* [Notifier]({doc-url}/components/notifier)
* [Optimize]({doc-url}/components/optimize)
* [Publisher]({doc-url}/components/publisher)
* [Support]({doc-url}/components/support)
* [Translation]({doc-url}/components/translation)
* [View]({doc-url}/components/view)
* [Widget]({doc-url}/components/widget)

We also have some independence packages that would work well with Orchestra Platform, including:

* [Avatar]({doc-url}/components/avatar)
* [Debug]({doc-url}/components/debug)
* [Facile]({doc-url}/components/facile)
* [Imagine]({doc-url}/components/imagine)
* [Parser]({doc-url}/components/parser)
* [Resources]({doc-url}/components/resources)
* [Tenanti]({doc-url}/components/tenanti)
* [Testbench]({doc-url}/components/testbench)
* [Theme Installer]({doc-url}/components/theme-installer)

<a name="version-compatibility"></a>
## Version Compatibility

Laravel    | Orchestra Platform  | Status
:----------|:--------------------|:----------------
 3.2.x     | 1.x                 | Deprecated
 4.0.x     | 2.0.x               | Deprecated
 4.1.x     | 2.1.x               | LTS
 4.2.x     | 2.2.x               | Deprecated
 5.0.x     | 3.0.x               | Supported

