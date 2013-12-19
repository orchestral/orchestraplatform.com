@extends('layout.master')

<? Site::set('html::header', ['class' => 'inner']); ?>

@section('header')
<div id="header_image" style="background: url({{ Theme::asset('assets/img/tracks.jpg') }}) top center no-repeat;">
    <div class="boxed">
        <div id="tagline" class="textcenter animated bounceInUp">
            <h1 class="tagline">Page not found</h1>
        </div>
    </div>
</div>
@stop
