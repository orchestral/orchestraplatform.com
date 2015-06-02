@extends('layouts.website')

@set_meta('html::body.attributes', ['id' => 'documentation'])

@section('content')
<section class="heading">
	<div class="container">
		<h1>{!! $version !!} documentation</h1>
	</div>
</section>
<section class="body">
	<div class="container">
		<div class="page-sidebar col-md-3">
			{!! array_get($html, 'toc') !!}
		</div>
		<div class="page-content col-md-9">
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<div class="page-header">
					<h1>{!! $document->get('title') !!}</h1>
				</div>
				{!! array_get($html, 'document') !!}
			</div>
		</div>
	</div>
</section>
@stop
