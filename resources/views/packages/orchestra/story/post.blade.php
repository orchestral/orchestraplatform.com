@extends('layouts.website')

@section('content')
@include('orchestra/story::_hero')
<div id="single-post">
    <div class="container">
        <div class="row">
            <div class="page-sidebar col-sm-2">
                <div class="author">
                    <img src="{!! Avatar::user($page->author) !!}" class="avatar img-circle">
                    <strong>{{ $page->author->fullname }}</strong>
                    <span>{{ $page->published_at->toFormattedDateString() }}</span>
                </div>
            </div>
            <div class="page-content col-sm-10">
                <div class="col-md-1"></div>
                <div class="post col-md-11">
                    <div class="page-header">
                        <h1><a href="{!! $page->link !!}">{!! $page->title !!}</a></h1>
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
</div>
@stop
