@extends('layouts.website')

@set_meta('html::body.attributes', ['id' => 'posts'])

@section('content')
@include('orchestra/story::_hero')
<section class="body">
	<div class="container">
		 @foreach ($posts as $post)
		<div class="row">
			<div class="page-sidebar col-sm-2">
				<div class="author">
					<img src="{!! Avatar::user($post->author) !!}" class="avatar img-circle">
					<strong>{{ $post->author->fullname }}</strong>
					<span>{{ $post->published_at->toFormattedDateString() }}</span>
				</div>
			</div>
			<div class="page-content col-sm-10">
				<div class="col-md-1"></div>
				<div class="post col-md-11">
					<div class="page-header">
						<h1 class="title"><a href="{!! $post->link !!}">{!! $post->title !!}</a></h1>
					</div>
					<div class="intro">
						{!! $post->excerpt !!}
					</div>
					<a href="{!! $post->link !!}" class="continue-reading">Continue reading this post</a>
				</div>
			</div>
		</div>
		@endforeach
		{!! $posts !!}
	</div>
</section>
@stop
