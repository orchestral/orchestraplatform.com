@extends('orchestra/foundation::layouts.main')

@section('content')
<div class="row">
	@if (count($panes) > 0)
	@foreach ($panes as $id => $pane)
		<?php $attributes = app('html')->decorate($pane->attributes); ?>
		<div{!! app('html')->attributes($attributes) !!}>
			@if (! empty($pane->html))
			{!! $pane->html !!}
			@else
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">{!! $pane->title !!}</h3>
				</div>
				{!! $pane->content !!}
				@endif
			</div>
		</div>
	@endforeach
	@else
	@include('orchestra/foundation::dashboard._welcome')
	@endif
</div>

@stop
