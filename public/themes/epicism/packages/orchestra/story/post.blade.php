@extends('layout.master')

<? Site::set('html::body', ['id' => 'index', 'class' => 'single single-post']); ?>

@section('content')
<section>
	<h2 class="title">{{ $page->title }}</h2>
	{{ $page->body }}
</section>
@stop
