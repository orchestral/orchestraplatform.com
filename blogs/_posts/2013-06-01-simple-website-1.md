---
layout: single-blog
title: Simple Website with Orchestra Platform 2 (Part 1)
lead: Introduction of Orchestra Platform 2
author:
  name: crynobone
  url: https://github.com/crynobone

---

This tutorial is based from [Laravel 4 - Simple Website with Backend Tutorial](http://www.codeforest.net/laravel4-simple-website-with-backend-1) and the source code would be available at <https://github.com/crynobone/playground>. The focus of this tutorial is to show everyone how the website can be done using Orchestra Platform in comparison how you would need to do it with Laravel 4.

To get started I would believe you already have some minimum knowledge on [Laravel 4](http://laravel.com), [Composer](http://getcomposer.org) and [Packagist](http://packagist.org). Now without wasting time let's boot up your terminal and run:

	$ composer create-project orchestra/platform playground v2.0.0-BETA1 --prefer-dist
	
This composer command would create a new project for you on `playground` folder using `v2.0.0-BETA1` version tag, `--prefer-dist` is another option that you can use to indicate that you want to download a distributed version instead of cloning the repository, otherwise use `--prefer-source`.

Now let make sure we got Laravel 4 running.

	$ cd playground
	$ php artisan serve
	Laravel development server started on http://localhost:8000

> `php artisan serve` would require PHP 5.4.* to work, as a demonstration I would use this technic so we can easily refer to the path.

## Installing Orchestra Platform


Now browse to <http://localhost:8000>, you should see the default Laravel 4 welcome page. Now let install Orchestra Platform, to do that simply browse to <http://localhost:8000/admin>. You should be able to see the following page:

![Installation, Requirement Page](/blogs/assets/2013/06/installation-requirement.png)

There a few requirement need to be considered:

* Write access to `app/storage` folder.
* Write access to `public/packages` folder, an FTP upload is possible as an alternative.
* Database connection.
* `User` model that extends `Orchestra\Model\User`.

### Setup Database Connection


In my case (and mostly your), we need to configure our database connection. Now let's create a `playground` database for our usage.

	$ mysql -uroot -proot
	mysql> create database `playground` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
	Query OK, 1 row affected (0.01 sec)
	
	mysql> quit
	Bye


Now open `app/config/database.php` and configure your connection. Reloading the <http://localhost:8000/admin> page and you can continue with the installation. Click **Next**, and you can create the default administrator user.

![Installation, Create User Page](/blogs/assets/2013/06/installation-create-user.png)

Hit **Submit** and your installation is done, how cool is that? Once the installation is done, you no longer have access to view the installation page, but instead redirected to the login page. Now let's try login in as see if that works.

![Logged In](/blogs/assets/2013/06/logged-in.png)

## What's Next

What I just shown you is the most basic requirement to setup the installation, in next chapter we would start using your `app` as an extension and what the cool feature that you can use to setup your application with Orchestra Platform.

[Continue reading Part 2](/blogs/2013/06/01/simple-website-2).

