---
title: Introduction

---

* [What is Orchestra Platform?](#what)
* [What Makes Orchestra Platform Different?](#what-different)
* [Illuminating Orchestra Platform](#illuminate)

## What is Orchestra Platform? {#what}

Provide a solid base off of which to build your new web applications. It's not a CMS. Instead, it's a springboard to build off of with many of the tools you wish you had on projects but never took the time to build. 

Have you had a client that wanted you to create a custom application but at the same time they're also looking to have a robust Content Management System within that same application? If you answered yes, what are your options?

* To build the application on top of WordPress (or other CMS system that you're familiar with).
* To build the application using your favourite language and framework while also integrating your own custom-built CMS components in it hoping that it's easy for your clients to use (just like how they were to use WordPress easily!)
* Or try to integrate both (which you know would be a bad idea from the start).

Orchestra Platform will solve this problem by creating a similar Administration Panel as you would see in WordPress *wp-admin*, so you can continue writing awesome code in Laravel but at the same time have CMS components ready at your disposal.


## What Makes Orchestra Platform Different? {#what-different}

* **Laravel Framework 4** is simply a great framework to work with.
* **Extensions** are a much needed improvement to package implementation in Laravel. With one click activation and upgrade (migration and publish).
* **Database Based Configuration** for any extensions are a solid replacement of file based configuration, stop telling your non-technical client to edit PHP file for any simple configuration changes.
* **Resources** lets you build HMVC implementation on top of Orchestra Platform. Hook your backend application to Orchestra with just simple API.
* **ACL and User Management** are repetitive boilerplate module on every projects, lets stop reinventing the wheel and let Orchestra Platform do its magic. If you need something more advanced, there are more than 20 events that you can hook into your own implementation without overwriting Orchestra Platform core file.
* **Responsive Design** is always available when you're on mobile.

## Illuminating Orchestra Platform {#illuminate}

With the introduction of Composer, we are now free to organize the code into smaller component where there would be use-case where you can use one or two Orchestra Platform components without everything else. At this moment we have organize the code into following components:

* Orchestra\Asset
* Orchestra\Auth
* Orchestra\Debug
* Orchestra\Extension
* Orchestra\Facile
* Orchestra\Foundation
* Orchestra\Html
* Orchestra\Memory
* Orchestra\Model
* Orchestra\Resources
* Orchestra\Support
* Orchestra\Testbench
* Orchestra\Translation
* Orchestra\View
* Orchestra\Widget
