@extends('orchestra/foundation::layouts.main')

@section('content')
<div class="row">
	@forelse($panes as $id => $pane)
		<div{!! HTML::attributes(HTML::decorate($pane->get('attributes'))) !!}>
			@if(! empty($pane->get('html')))
			{!! $pane->get('html') !!}
			@else
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">{!! $pane->get('title') !!}</h3>
				</div>
				{!! $pane->get('content') !!}
			@endif
			</div>
		</div>
	@empty
	@include('orchestra/foundation::dashboard._welcome')
	@endforelse
</div>

@stop
