@extends('layout.master')

<? Site::set('html::header', ['class' => 'front']); ?>

@section('header')
<div id="slider">
    <ul class="nolist slides">
       <li class="textcenter animated slideInDown" style="background-image: url({{ Theme::asset('assets/img/slide2.jpg') }});" title="We build awesome.">
           <h1 class="animated bounceInLeft">Let build awesome.</h1>
           <div class="animated bounceInUp">
           		<p>Orchestra Platform provide all the boilerplate for your application, so you can create awesomeness.</p>
               <p><a class="button" href="#">I want it now</a></p>
           </div>
       </li>
       <li class="textcenter animated slideInDown" style="background-image: url({{ Theme::asset('assets/img/slide1.jpg') }});" title="The next level.">
           <h1 class="animated bounceInLeft">The next level.</h1>
           <div class="animated bounceInUp">
           		<p>Orchestra Platform is built from 17 components that utilize all the best tool available with Laravel 4 and PHP</p>
               <p><a class="button" href="#">I want it now</a></p>
           </div>
       </li>
   </ul>
</div>
<script src="{{ Theme::asset('assets/js/slider.js') }}"></script>
<script type="text/javascript">
   jQuery(document).ready(function($) {
       $('#slider').unslider({
           speed: 1000,               //  The speed to animate each slide (in milliseconds)
           delay: 6000,               //  The delay between slide animations (in milliseconds)
           complete: function() {},   //  A function that gets called after every slide animation
           keys: true,                //  Enable keyboard (left, right) arrow shortcuts
           dots: true,                //  Display dot navigation
           fluid: true                //  Support responsive design. May break non-responsive designs
       });

       var slides = $('.slides'),
       i = 0;

       slides.on('swipeleft', function(e){
           slides.eq(i + 1).addClass('active');
       }).on('swiperight', function(e){
           slides.eq(i - 1).addClass('active');
       });
    });
</script>
@stop
