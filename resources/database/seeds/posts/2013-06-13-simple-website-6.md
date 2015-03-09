---
layout: single-blog
title: Simple Website with Orchestra Platform 2 (Part 6)
lead: Introduction to Orchestra Control
author:
  name: crynobone
  url: https://github.com/crynobone

---

In this chapter I would like to introduce Control Extension for Orchestra Platform. It's one of official extension that has been ported from Orchestra Platform 1, which is [Localtime](http://bundles.laravel.com/bundle/localtime), [Authorize](http://bundles.laravel.com/bundle/authorize) and soon to be added [Melody Theme Manager](http://bundles.laravel.com/bundle/melody).

## Installation

Installation is as easy as adding the it to playground's main `composer.json`:

	"require": {
		"orchestra/foundation": "2.0.0-BETA4",
		"orchestra/control": "2.0.*"
	},

Now all we need to do is run `composer update`.

	$ composer update

Once that is done, let's boot our application and activate Control extension.

	$ php artisan serve

	Laravel development server started on http://localhost:8000

Let's open <http://localhost:8000/admin/extensions>.

![Control Extension](/uploads/2013/06/control-extension.png)

Time to activate it, yes installation is always as easy as that. Well there might be server setup that require you to fill in your FTP credential so that we can push extension asset to public folder but I have to cover that in later chapter, but basically it's as fluent as WordPress FTP Update.

## Using Control

Now let's see what we can do with Control by visiting <http://localhost:8000/admin/resources/control>.

### Dashboard

![Control Dashboard](/uploads/2013/06/control-dashboard.png)

I have to admit, the dashboard is pretty dull at the moment. Anyone with great UI skill want to brush it up?

### Role Management

![Control Role Management](/uploads/2013/06/control-role-management.png)

Role management at your disposal, how cool is that? However to prevent accidental deletion Administrator and Member role can't be deleted via this interface.

### ACL Management

![Control ACL Management](/uploads/2013/06/control-acl-management.png)

Now, here what I would say Orchestra Platform RBAC is so flexible. "Orchestra" and "Playground" has it's own RBAC configuration where it help developer to control different type of association, a user with one extension maybe an admin on another.
