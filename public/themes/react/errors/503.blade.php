@extends('layout.master')

<?php set_meta('html', ['class' => 'not-found-page']); ?>
<?php set_meta('html::body', ['id' => 'not-found', 'class' => 'not-found-page']); ?>
<?php set_meta('html::header.enabled', false); ?>
<?php set_meta('html::footer.enabled', false); ?>

@section('content')
<div class="info">
	<h1>503</h1>
	<p>Be right back.</p>
</div>
<div id="container"></div>
@stop
