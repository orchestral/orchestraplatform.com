@extends('layout.master')

<?php set_meta('html', ['class' => 'not-found-page']); ?>
<?php set_meta('html::body', ['id' => 'not-found', 'class' => 'not-found-page']); ?>
<?php set_meta('html::header.enabled', false); ?>
<?php set_meta('html::footer.enabled', false); ?>

@section('content')
<div class="info">
	<h1>404</h1>
	<p>The page you're looking for doesn't exist.</p>

	<p class="go-back">
		Continue to our <a href="{!! handles('app::/') !!}">Home page</a>.
	</p>
</div>
<div id="container"></div>
@stop
