@extends('layout.master')

<?

Site::set('html::body', ['id' => 'index', 'class' => 'single documentation']);
Site::set('html::header', ['class' => 'inner']); ?>

@section('header')
<div id="header_image" style="background: url({{ Theme::asset('assets/img/static.jpg') }}) top center no-repeat;">
    <div class="boxed">
        <div id="tagline" class="textcenter">
            <h1 class="tagline animated bounceInUp">{{ $document->get('title') }}</h1>
            <h6 class="textcenter animated bounceInDown">{{ $version }} documentation</h6>
        </div>
    </div>
</div>
@stop

@section('content')
<section id="single">
    <div class="boxed">
        <article class="documentation">
            <div class="one_fifth post-toc">
                {{ $toc->getHtmlContent() }}
                <hr>
            </div>
            <div class="four_fifth post-body">
            	{{ $document->getHtmlContent() }}
            </div>
        </article>

    </div>
</section>
@stop
