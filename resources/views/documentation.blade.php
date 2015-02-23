@extends('layouts.website')

@section('content')
<section id="hero" class="text-center">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>{!! $document->get('title') !!}<br><small>{!! $version !!} documentation</small></h1>
        </div>
    </div>
</section>
<section id="documentation">
    <div class="container">
        <div id="sidebar" class="col-md-3">
            {!! array_get($html, 'toc') !!}
        </div>
        <div id="content" class="col-md-8 col-md-offset-1">
            <div class="page-header">
                </div>
            {!! array_get($html, 'document') !!}
        </div>
    </div>
</section>
@stop
