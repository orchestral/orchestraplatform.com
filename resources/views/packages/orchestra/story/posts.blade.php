@extends('layouts.website')

@section('content')
@include('orchestra/story::_hero')
<div id="posts">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @foreach ($posts as $post)
                <div class="post">
                    <div class="page-header">
                        <h1 class="title"><a href="{!! $post->link !!}">{!! $post->title !!}</a></h1>
                    </div>
                    <div class="author">
                        {{ $post->author->fullname }} on {{ $post->published_at->toFormattedDateString() }}
                    </div>
                    <div class="intro">
                        {!! $post->excerpt !!}
                    </div>
                    <a href="{!! $post->link !!}" class="continue-reading">Continue reading this post</a>
                </div>
                @endforeach

                {!! $posts->render() !!}
            </div>
        </div>
    </div>
</div>
@stop
