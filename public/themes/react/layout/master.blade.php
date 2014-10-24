<!DOCTYPE html>
<html{!! HTML::attributes(HTML::decorate(get_meta('html', []), [])) !!}>
<head>
	@include('layout._header')
</head>
<body{!! HTML::attributes(HTML::decorate(get_meta('html::body', []), [])) !!}>
	@if (get_meta('html::header.enabled', true) === true)
	@include('layout._navigation')
	@endif
	@yield('header')
	@yield('content')

	@if (get_meta('html::footer.enabled', true) === true)
	@include('layout._footer')
	@endif
</body>
</html>
