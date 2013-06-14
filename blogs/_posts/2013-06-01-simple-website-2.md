---
layout: single-blog
title: Simple Website with Orchestra Platform 2 (Part 2)
lead: Creating a Simple Extension
author:
  name: crynobone
  url: https://github.com/crynobone

---

Let straight away continue from where we left off on [Simple Website with Orchestra Platform 2 (Part 1)](/blogs/2013/06/01/simple-website-1/). First we need to convert the `app` folder to be an extension, to do this lets create `app/orchestra.json` file and insert the content below.

	{
		"name": "Playground",
		"description": "Sample app tutorial for Simple Website with Orchestra Platform 2",
		"author": "Mior Muhammad Zaki",
		"url": "https://github.com/crynobone/playground",
		"version": "1.0.0"
	}

So what have we accomplish by doing this? Browsing to <http://localhost:8000/admin/extensions> would show you that `app` is now available as an extension, cool eh?

![Playground Extension is available](/blogs/assets/2013/06/playground-extension-available.png)

## Our `app` Migrations

Before we activate this extension, let's prepare our migrations so we can see how easy it is to manage migration process for extension.

### Articles migration

	$ php artisan migrate:make create_articles_table --table=articles --create
	
	Created Migration: 2013_06_02_072044_create_articles_table
	Generating optimized class loader
	Compiling common classes

The following command would create an empty migration at `app/database/migrations/{timestamp}_create_articles_table.php` and we need to include additional fields to it.

	<?php
	
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateArticlesTable extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('articles', function (Blueprint $table)
			{
				$table->increments('id');
				$table->string('title');
				$table->string('slug');
				$table->text('body')->nullable();
				$table->string('image')->nullable();
				$table->integer('user_id');
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::drop('articles');
		}

	}

### Pages migration

	$ php artisan migrate:make create_pages_table --table=pages --create
	
	Created Migration: 2013_06_02_072828_create_pages_table
	Generating optimized class loader
	Compiling common classes

The following command would create an empty migration at `app/database/migrations/{timestamp}_create_pages_table.php` and we need to include additional fields to it.

	<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreatePagesTable extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('pages', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('title');
				$table->string('slug');
				$table->text('body')->nullable();
				$table->integer('user_id');
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::drop('pages');
		}

	}

## Activating `app` Extension

Let's see some cool stuff, instead of running `php artisan migrate`, let simply activate the `app` extension and let Orchestra Platform handle the migration for you. Go back to <http://localhost:8000/admin/extensions> and click **Activate** (next to **Playground** title), and the result?

	$ mysql -uroot -proot
	mysql> use playground;
	mysql> show tables;
	
	+----------------------+
	| Tables_in_playground |
	+----------------------+
	| articles             |
	| migrations           |
	| orchestra_options    |
	| pages                |
	| password_reminders   |
	| roles                |
	| user_meta            |
	| user_role            |
	| users                |
	+----------------------+
	9 rows in set (0.00 sec)

## Our `app` Model

Additional to our migrations, we should be able to create basic model for `Article` and `Page` using `Eloquent`, it's a good practise that we namespace our class but I'm not going to do it on this tutorial just for the sake of simplicity.

### Article model

	<?php 
	
	class Article extends Eloquent {
		
		protected $table = 'articles';
	
		public function author()
		{
			return $this->belongsTo('User', 'user_id');
		}
	}
	
### Page model

	<?php 
	
	class Page extends Eloquent {
		
		protected $table = 'pages';
	
		public function author()
		{
			return $this->belongsTo('User', 'user_id');
		}
	}

## What's Next?

Next we going to look at creating resources to manage articles and pages from Orchestra Platform Administrator Interface. 

> Where the seeding example, as in [Laravel 4 - Simple Website with Backend Tutorial](http://www.codeforest.net/laravel4-simple-website-with-backend-1)?

There wouldn't be any seeding example since we don't need one. With Orchestra Platform installation, we already have an administrator user account and pages or articles seeding can be done directly using our resource in later tutorial.

[Continue reading Part 3](/blogs/2013/06/01/simple-website-3).
