@extends('layout.master')

<?

Site::set('html::body', ['class' => 'blog']);
Site::set('html::header', ['class' => 'inner']); ?>

@section('header')
<div id="header_image" style="background: url({{ Theme::asset('assets/img/tracks.jpg') }}) top center no-repeat;">
    <div class="boxed">
        <div id="tagline" class="textcenter animated bounceInUp">
            <h1 class="tagline">News, update and tutorial</h1>
        </div>
    </div>
</div>
@stop

@section('content')
<section id="articles">
    <div class="boxed">
        @foreach ($posts as $post)
        <article class="single">
            <div class="one_full">
                <h4>
                    <a href="{{ $post->link }}">{{ $post->title }}</a>
                </h4>
            </div>
            <div class="one_quarter">
                <ul class="postmeta nolist muted">
                    <li class="date">Date: <strong>{{ $post->published_at->toFormattedDateString() }}</strong></li>
                    <li class="comments">Comments: <strong>4</strong></li>
                    <li class="author">Author: <strong>{{ $post->author->fullname }}</strong></li>
                </ul>
            </div>
            <div class="three_quarter post-body">
                {{ $post->body }}
            </div>
        </article>
        @endforeach
    </div>

    <div class="pagination">
        <div class="boxed">
            <span class='page-numbers current'>1</span>
            <a class='page-numbers' href="#">2</a>
            <a class="next page-numbers" href="#">Older Posts &raquo;</a>
        </div>
    </div>
</section>
@stop
