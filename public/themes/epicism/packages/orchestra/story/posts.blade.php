@extends('layout.master')

<? Site::set('html::body', ['class' => 'blog']); ?>

@section('header')
<header class="inner" id="header" role="header">
    <div id="header_image" style="background: url({{ Theme::asset('assets/img/tracks.jpg') }}) top center no-repeat;">
        <div class="boxed">
            <!-- tagline -->
            <div id="tagline" class="textcenter animated bounceInUp">
                <h1 class="tagline">News, update and tutorial</h1>
            </div>
            <!-- /tagline -->
        </div>
    </div>
</header>
@stop

@section('content')
<!-- content -->
<div id="content">

    <!-- articles -->
    <section id="articles">
        <div class="boxed">

            <!-- aside -->
            <aside id="aside">
                <div class="widget">
                    <form role="search" method="get" id="searchform" class="searchform" action="blog.html">
                        <div>
                            <label class="screen-reader-text" for="s">Search for:</label>
                            <input type="text" value="" name="s" id="s" />
                            <input type="submit" id="searchsubmit" value="Search" />
                        </div>
                    </form>
                </div>

                <div class="widget">
                    <h4>Recent Posts</h4>
                    <ul>
                        <li><a href="single-post.html">Summer outdoors.</a></li>
                        <li><a href="single-post.html">The Jezabels.</a></li>
                        <li><a href="single-post.html">Grinding the crack Zeb Corliss.</a></li>
                        <li><a href="single-post.html">Working on some typography.</a></li>
                        <li><a href="single-post.html">Our minimalistic office space.</a></li>
                   </ul>
                </div>

                <div class="widget">
                   <h4>Recent Comments</h4>
                   <ul>
                       <li>Scott on <a href="#">Our minimalistic office space.</a></li>
                       <li>Scott on <a href="#">Summer outdoors.</a></li>
                       <li>Scott on <a href="#">Summer outdoors.</a></li>
                       <li>Scott on <a href="#">Summer outdoors.</a></li>
                       <li>Scott on <a href="#">Summer outdoors.</a></li>
                   </ul>
                </div>

                <div class="widget">
                   <h4>Archives</h4>
                   <ul>
                       <li><a href='blog.html'>November 2013</a></li>
                   </ul>
                </div>

                <div class="widget">
                   <h4>Categories</h4>
                   <ul>
                       <li><a href="blog.html" title="View all posts filed under Music">Music</a></li>
                       <li><a href="blog.html" title="View all posts filed under Office">Office</a></li>
                       <li><a href="blog.html" title="View all posts filed under Outdoor">Outdoor</a></li>
                       <li><a href="blog.html" title="View all posts filed under Photo">Photo</a></li>
                       <li><a href="blog.html" title="View all posts filed under Refinery">Refinery</a></li>
                       <li><a href="blog.html" title="View all posts filed under Video">Video</a></li>
                       <li><a href="blog.html" title="View all posts filed under Work">Work</a></li>
                    </ul>
                </div>

                <div class="widget">
                   <h4>Meta</h4>
                   <ul>
                       <li><a href="#">Site Admin</a></li>
                       <li><a href="#">Log out</a></li>
                       <li><a href="#" title="Syndicate this site">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
                       <li><a href="#" title="The latest comments">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>                                        </ul>
                 </div>
             </aside>
             <!-- aside -->

             <!-- posts -->
             <article class="post">
                 <div class="one_third">
                     <h4><a href="single-post.html">Summer outdoors.</a></h4>
                     <ul class="postmeta nolist muted">
                         <li class="date">Date: <strong>4 November 2013</strong></li>
                         <li class="comments">Comments: <strong>4</strong></li>
                         <li>Tags: <strong><a href="blog.html" rel="tag">nature</a>, <a href="blog.html" rel="tag">outdoors</a>, <a href="blog.html" rel="tag">searching</a></strong></li>
                         <li class="author">Author: <strong>Scott</strong></li>
                     </ul>
                 </div>
                 <div class="two_third">
                     <div class="featured_image">
                         <a href="single-post.html">
                             <img class="featured" src="http://placehold.it/800x400" alt="Summer outdoors." />
                        </a>
                     </div>
                     <p>Morbi a enim in magna semper bibendum. Etiam scelerisque, nunc ac egestas consequat, odio nibh euismod nulla, eget auctor orci nibh vel nisi. Aliquam erat volutpat. Mauris vel neque sit amet nunc gravida congue sed sit amet purus. Quisque lacus quam, egestas ac tincidunt a, lacinia vel velit. Aenean facilisis nulla vitae urna tincidunt congue [&hellip;]</p>
                 </div>
             </article>
        </div>

        <!-- pagination -->
        <div class="pagination">
            <div class="boxed">
                <span class='page-numbers current'>1</span>
                <a class='page-numbers' href="#">2</a>
                <a class="next page-numbers" href="#">Older Posts &raquo;</a>
            </div>
        </div>
        <!-- /pagination -->

    </section>
</div>
@stop
