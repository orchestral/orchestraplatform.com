<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Orchestra Platform">
	<meta name="author" content="Orchestra Platform Development Team">
	<meta name="google-site-verification" content="wriGs2g_FgxPwFi5VvM7kZ0Y0v_hi_Ub0QAbKLgRVi0" />

	@title()

	<meta property="og:url" content="{{ URL::current() }}">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{ asset('img/bg-cover.jpg') }}">
	<meta property="og:site_name" content="{{ memorize('site.name') }}">
	<meta property="og:title" content="{{ get_meta('title') }}">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
	<script src="{{ elixir('js/all.js') }}"></script>
	<link href="{{ elixir('css/all.css') }}" rel="stylesheet">
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	@stack('assets.header')
</head>
</html>
<body{!! HTML::attributes(get_meta('html::body.attributes', [])) !!}>
