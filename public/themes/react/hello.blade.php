@extends('layout.master')

<?php

set_meta('html::body', ['id' => 'home4']);
set_meta('html::header', ['class' => 'navbar-inverse hero']); ?>

@section('header')
<div id="hero">
	<div class="container">
		<h1 class="hero-text">Orchestra Platform provide all the boilerplate for your application, so you can create awesomeness.</h1>
		<div class="cta">
			<a href="#" class="button" data-toggle="modal" data-target="#download" class="download">I want it now</a>
			<a href="{!! handles('app::docs/latest') !!}" class="documentation">Read the documentation</a>
		</div>
		<div class="screenshot animated fadeInUp">
			<img src="{!! Theme::asset('assets/images/ss2.png') !!}" class="img-responsive" alt="screenshot" />
		</div>
	</div>
</div>
<div class="modal fade" id="download">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Quick Installation</h4>
			</div>
			<div class="modal-body">
				<p>You can install Orchestra Platform using Composer:</p>
				<pre>composer create-project orchestra/platform website 2.2.x --prefer-dist</pre>
			</div>
		</div>
	 </div>
</div>
@stop

@section('content')
@include('hello._features')
{{-- @include('hello._pricing') --}}

@stop
