---
layout: single-blog
title: Simple Website with Orchestra Platform 2 (Part 5)
lead: Defining Resource Using Resource Controller
author:
  name: crynobone
  url: https://github.com/crynobone

---

A bit of recap, until up to now we have learn about [Installation](/blogs/2013/06/01/simple-website-1), [Creating Extension](/blogs/2013/06/01/simple-website-2), [Role Based Access Control](/blogs/2013/06/01/simple-website-3) and [Defining Resource Using Restful](/blogs/2013/06/02/simple-website-4). Today let's learn how to create resources controller routing using `Orchestra\Resources`. 

> This is a pretty complex chapter so I going to focusing on Orchestra Platform features instead of Laravel 4.

## Adding child Resource

To add a child resource is as easier, since we already have `$playground` as instance of `Orchestra\Resources\Container` all you need to do is add:

	$playground['pages'] = 'resource:AdminPagesController';
	
	// or possible with
	$playground->pages = 'resource:AdminPagesController';
	
	// or also the same with
	$playground->route('pages', 'resource:AdminPagesController');
	
We would know that when <http://localhost:8000/admin/resources/playground.pages> is called we should look for `AdminArticlesController`:

	Event::listen('orchestra.started: admin', function ()
	{
		$playground = Orchestra\Resources::make('playground', [
			'name'       => 'Playground',
			'uses'       => 'restful:AdminHomeController',
			'visibility' => function ()
			{
				$acl = Orchestra\Acl::make('playground');
				
				return ($acl->can('manage article') or $acl->can('manage page'));
			}, 
		]);

		$playground['pages'] = 'resource:AdminPagesController';
	});
	
## Pages Controller

`AdminPagesController` would be using resource routing, this is cool. Now everything that you would see next is almost 90% following Laravel 4 structure except that Orchestra Platform has few helper class that would definitely make your life easier. Do take note on `Orchestra\Form`, `Orchestra\Messages` and `Orchestra\Site` usage.

	<?php 

	use Orchestra\Acl;
	use Orchestra\Form;
	use Orchestra\Messages;
	use Orchestra\Site;

	class AdminPagesController extends BaseController {

		public function __construct()
		{
			$this->beforeFilter(function ()
			{
				if ( ! Acl::make('playground')->can('manage article'))
				{
					return Redirect::to(handles('orchestra/foundation::/'));
				}
			});
		}

		public function index()
		{
			Site::set('title', 'List of Pages');

			$pages = Page::with('author')->paginate(30);

			return View::make('admin.pages.index', compact('pages'));
		}

		public function create()
		{
			Site::set('title', 'Create a Page');

			$form = Form::make(function ($form)
			{
				$form->with(new Page);
				$form->attributes([
					'url'    => handles('orchestra/foundation::resources/playground.pages'),
					'method' => 'POST'
				]);

				$form->fieldset(function ($fieldset)
				{
					$fieldset->control('input:text', 'title');
					$fieldset->control('input:text', 'slug');
					$fieldset->control('textarea', 'body');
				});
			});

			return View::make('admin.pages.edit', compact('form'));
		}

		public function store()
		{
			$input = Input::all();
			$rules = array(
				'title' => ['required'],
				'body'  => ['required'],
				'slug'  => ['required', 'unique:pages,slug']
			);

			$validation = Validator::make($input, $rules);

			if ($validation->fails())
			{
				return Redirect::to(handles('orchestra/foundation::resources/playground.pages/create'))
						->withInput()
						->withErrors($validation);
			}

			$page          = new Page;
			$page->title   = $input['title'];
			$page->body    = $input['body'];
			$page->slug    = $input['slug'];
			$page->user_id = Auth::user()->id;
			$page->save();

			Messages::add('success', 'Page has been added');

			return Redirect::to(handles('orchestra/foundation::resources/playground.pages'));
		}

		public function edit($id)
		{
			Site::set('title', 'Edit a Page');

			$form = Form::make(function ($form) use ($id)
			{
				$form->with(Page::find($id));
				$form->attributes([
					'url'    => handles("orchestra/foundation::resources/playground.pages/{$id}"),
					'method' => 'PUT'
				]);

				$form->fieldset(function ($fieldset)
				{
					$fieldset->control('input:text', 'title');
					$fieldset->control('input:text', 'slug');
					$fieldset->control('textarea', 'body');
				});
			});

			return View::make('admin.pages.edit', compact('form'));
		}

		public function update($id)
		{
			$page  = Page::findOrFail($id);
			$input = Input::all();
			$rules = array(
				'title' => ['required'],
				'body'  => ['required'],
				'slug'  => ['required', "unique:pages,slug,{$id}"]
			);

			$validation = Validator::make($input, $rules);

			if ($validation->fails())
			{
				return Redirect::to(handles("orchestra/foundation::resources/playground.pages/{$id}/edit"))
						->withInput()
						->withErrors($validation);
			}

			$page->title = $input['title'];
			$page->body  = $input['body'];
			$page->slug  = $input['slug'];
			$page->save();

			Messages::add('success', 'Page has been updated');

			return Redirect::to(handles('orchestra/foundation::resources/playground.pages'));
		}

		public function delete($id)
		{
			return $this->destroy($id);
		}

		public function destroy($id)
		{
			$page = Page::findOrFail($id);
			$page->delete();

			Messages::add('success', 'Page has been deleted');

			return Redirect::to(handles('orchestra/foundation::resources/playground.pages'));
		}
	}

## Pages Views

As you can see we only need two views:

### index.blade.php

	<?php Orchestra\Site::set('header::add-button', true); ?>
	@include('orchestra/foundation::layout.widgets.header')

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Post</th>
				<th>Posted By</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@if ($pages->isEmpty())
			<tr>
				<td colspan="4">No records</td>
			</tr>
			@else
			@foreach ($pages as $page)
			<tr>
				<td><?php echo $page->id; ?></td>
				<td><?php echo $page->title; ?></td>
				<td><?php echo $page->author->fullname; ?></td>
				<td>
					<div class="btn-group">
						<a href="<?php echo handles("orchestra/foundation::resources/playground.pages/{$page->id}/edit"); ?>" 
							class="btn btn-mini btn-warning">Edit</a>
						<a href="<?php echo handles("orchestra/foundation::resources/playground.pages/{$page->id}/delete"); ?>" 
							class="btn btn-mini btn-danger">Delete</a>
					</div>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>

	<?php echo $pages->links(); ?>

### edit.blade.php

	@include('orchestra/foundation::layout.widgets.header')
	
	<?php echo $form; ?>

Let's try them out, fire up `artisan serve` and browse to <http://localhost:8000/admin/resources/playground.pages>.

## What? A Bug!

If you happen to see this as I did:

	ErrorException
	Trying to get property of non-object
	
It was due to misconfigured Eloquent relationship that we set earlier. To fixed this change `$this->belongsTo('User')` to `$this->belongsTo('User', 'user_id')`.

### Article

	<?php 

	class Article extends Eloquent {
		
		protected $table = 'articles';

		public function author()
		{
			return $this->belongsTo('User', 'user_id');
		}
	}


### Page

	<?php 

	class Page extends Eloquent {
		
		protected $table = 'pages';

		public function author()
		{
			return $this->belongsTo('User', 'user_id');
		}
	}

## What's Next

Next we going to continue working on resource controller for articles, but I'll be focusing more on `Orchestra\Form`, `Orchestra\Messages`, `Orchestra\Table` and `Orchestra\Site`.

Stay tune. 
