@extends('layouts.website')

@set_meta('html::body.attributes', ['id' => 'landing'])

@section('content')
@include('welcome._intro')
@include('welcome._features')
@include('welcome._packages')
{{--
@include('welcome._screenshots')
@include('welcome._testimonial')
@include('welcome._videos')
--}}
@include('welcome._social')
@stop
