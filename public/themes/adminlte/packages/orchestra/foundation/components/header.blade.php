<?php

$title = get_meta('title');
$description = get_meta('description'); ?>

<section class="content-header">
	@if (get_meta('header::add-button'))
	<div class="pull-right">
		<a href="{!! app('url')->current() !!}/create" class="btn btn-primary">
			{{ trans('orchestra/foundation::label.add') }}
		</a>
	</div>
	@endif
	<h1>
		{!! $title or '' !!}
		@if (! empty($description))
		<small>{!! $description or '' !!}</small>
		@endif
	</h1>
</section>
