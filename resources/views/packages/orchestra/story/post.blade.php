@extends('layouts.website')

@section('content')
@include('orchestra/story::_hero')
<div id="single-post">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 post">
                <div class="page-header">
                    <h1><a href="{!! $page->link !!}">{!! $page->title !!}</a></h1>
                </div>
                <div class="author">
                    {{-- <img src="images/testimonials/testimonial2.jpg" class="avatar" alt="author" /> --}}
                    {{ $page->author->fullname }} on {{ $page->published_at->toFormattedDateString() }}
                </div>
                <div class="content">
                    {!! $page->body !!}
                </div>

                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                    var disqus_shortname = 'orchestraplatform-blog'; // required: replace example with your forum shortname
                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
            </div>
        </div>
    </div>
</div>
@stop
