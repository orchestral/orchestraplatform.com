---
title: Using Resources
---

`Orchestra\Resources` offer more control to developer to create application on top of Orchestra Platform Administrator Interface. The idea is to allow controllers to be map to specific URL in Orchestra Platform Administrator Interface.

* [Adding a Resource](#adding-a-resource)
* [Adding a Child Resource](#adding-a-child-resource)
* [Returning Response from a Resource](#returning-response-from-a-resource)

## Adding a Resource {#adding-a-resource}

Normally we would identify an extension to a resource for ease of use, however Orchestra Platform still allow a single extension to register multiple resources if such requirement is needed.

	Event::listen('orchestra.started: admin', function () {
		$robots = Orchestra\Resources::make('robotix', [
			'name'    => 'Robots.txt',
			'uses'    => 'Robotix\ApiController',
			'visible' => function ()
			{
				return (Orchestra\App::acl()->can('manage orchestra'));
			},
		]);
	});

Name     | Usage
:--------|:-------------------------------------------------------
name     | A name or title to refer to the resource.
uses     | a path to controller, you can prefix with either `restful:` (default) or `resource:` to indicate how Orchestra Platform should handle the controller.
visible  | Choose whether to include the resource to Orchestra Platform Administrator Interface menu.

Orchestra Platform Administrator Interface now would display a new tab next to Extension, and you can now navigate to available resources.

## Adding a Child Resource {#adding-a-child-resource}

A single resource might require multiple actions (or controllers), we allow such feature to be used by assigning child resources.

	$robots->pages = 'resource:Robotix\PagesController';

Nested resource controller is also supported:

	$robots['pages.comments'] = 'resource:Robotix\Pages\CommentController';

## Returning Response from a Resource {#returning-response-from-a-resource}

Controllers mapped as Orchestra Platform Resources is no different from any other controller except the layout is using Orchestra Platform Administrator Interface. You can use `View`, `Response` and `Redirect` normally as you would without Orchestra Platform integration.
