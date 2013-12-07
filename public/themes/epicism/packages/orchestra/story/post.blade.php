@extends('layout.master')

<? Site::set('html::body', ['id' => 'index', 'class' => 'single single-post']); ?>

@section('content')
<section id="single">
    <div class="boxed">
        <article class="post single_post">
            <div class="one_full">
                <h4>
                    <a href="{{ $page->link }}">{{ $page->title }}</a>
                </h4>
            </div>
            <div class="one_fifth">
                <ul class="postmeta nolist muted">
                    <li class="date">Published on <strong>{{ $page->published_at->toFormattedDateString() }}</strong></li>
                    <li class="author">By <strong>{{ $page->author->fullname }}</strong></li>
                    <li class="tweet">
                        <a href="//twitter.com/share" class="twitter-share-button" data-lang="en" url="#" data-via="getorchestra">Tweet</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    </li>
                </ul>
                <hr>
                <div class="postnavi">
                    <ul class="nolist">
                        <li><a href="{{ URL::to(handles('orchestra/story::/')) }}" rel="prev"><span class="tooltip-s" title="The Jezabels.">&lsaquo;</span></a></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="four_fifth post-body">
            	{{ $page->body }}
            </div>
        </article>

    </div>
</section>
<section id="commentbox">
    <div class="boxed">
        <div id="disqus_thread" class="one_full"></div>
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
</section>
@stop
