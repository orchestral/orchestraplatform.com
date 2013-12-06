@extends('layout.master')

<? Site::set('html::body', ['id' => 'index', 'class' => 'single documentation']); ?>

@section('content')
<section id="single">
    <div class="boxed">
        <article class="documentation single_post">
            <div class="one_full">
                <h4>
                    <a href="{{ URL::current() }}">{{ $document->get('title') }}</a>
                </h4>
            </div>
            <div class="one_fifth">
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
