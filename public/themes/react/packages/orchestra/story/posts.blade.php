@extends('layout.master')

<?php

Site::set('html::body', ['id' => 'blog']);
Site::set('html::header', ['class' => 'navbar-inverse normal']); ?>

@section('content')
<div id="posts">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				@foreach ($posts as $post)
				<div class="post">
					<div class="title">
						<a href="{{ $post->link }}">{{ $post->title }}</a>
					</div>
					<div class="author">
						{{-- <img src="images/testimonials/testimonial2.jpg" class="avatar" alt="author" /> --}}
						{{ $post->author->fullname }} on {{ $post->published_at->toFormattedDateString() }}
					</div>
					<div class="intro">
						{{ $post->excerpt }}
					</div>
					<a href="{{ $post->link }}" class="continue-reading">Continue reading this post</a>
				</div>
				@endforeach

				{{ $posts->links() }}
			</div>
			<div class="col-md-3 sidebar">
				@include('orchestra/story::_sidebar')
			</div>
		</div>
	</div>
</div>
@stop
