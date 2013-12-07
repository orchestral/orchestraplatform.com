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
            <div class="one_fifth">
                <ul class="postmeta nolist muted">
                    <li class="date">Published on <strong>{{ $post->published_at->toFormattedDateString() }}</strong></li>
                    <li class="comments">With <strong><a href="{{ $post->link }}#disqus_thread">0 Comments</a></strong></li>
                    <li class="author">By <strong>{{ $post->author->fullname }}</strong></li>
                </ul>
            </div>
            <div class="four_fifth post-body">
                {{ $post->body }}
            </div>
        </article>
        @endforeach
    </div>

    <div class="pagination">
        <div class="boxed">
            <? $presenter = new Platform\Workless\WorklessPresenter($posts) ?>

            @if ($posts->getLastPage() > 1)
                {{ $presenter->render() }}
            @endif
        </div>
    </div>
</section>
<script type="text/javascript">
/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'orchestraplatform-blog'; // required: replace example with your forum shortname

/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
    var s = document.createElement('script'); s.async = true;
    s.type = 'text/javascript';
    s.src = '//' + disqus_shortname + '.disqus.com/count.js';
    (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>
@stop
