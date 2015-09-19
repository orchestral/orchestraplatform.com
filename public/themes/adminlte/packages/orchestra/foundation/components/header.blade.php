#{{ $description = get_meta('description') }}

<section class="content-header">
	@if(get_meta('header::add-button'))
	<div class="pull-right">
		<a href="{!! URL::current() !!}/create" class="btn btn-primary">
			{{ trans('orchestra/foundation::label.add') }}
		</a>
	</div>
	@endif
	<h1>
		@get_meta('title', '')
		@if(! empty($description))
		<small>{!! $description or '' !!}</small>
		@endif
	</h1>
</section>
