@extends('layout.master')

<? Site::set('html::body', ['id' => 'index', 'class' => 'single single-post']); ?>

@section('content')
<section id="single">
    <div class="boxed">

        <article class="post single_post">
            <div class="one_quarter">
                <h4><a href="{{ $page->link }}">{{ $page->title }}</a></h4>
                <hr>
                <ul class="postmeta nolist muted">
                    <li class="date">Date: <strong>4 November 2013</strong></li>
                    <li class="comments">Comments: <strong>4</strong></li>
                    <li class="author">Author: <strong>{{ $page->author->fullname }}</strong></li>
                    <li class="tweet">
                        <a href="//twitter.com/share" class="twitter-share-button" data-lang="en" url="#" data-via="getorchestra">Tweet</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    </li>
                </ul>
                <hr>
                <div class="postnavi">
                    <ul class="nolist">
                        <li><a href="#" rel="prev"><span class="tooltip-s" title="The Jezabels.">&lsaquo;</span></a></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="three_quarter post-body">
            	{{ $page->body }}
            </div>
        </article>

    </div>
</section>
<section id="commentbox">
    <div class="boxed">
    </div>
</section>
@stop
