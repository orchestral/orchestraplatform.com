<!DOCTYPE html>
<html{{ HTML::attributes(HTML::decorate(Site::get('html', []), [])) }}>
<head>
	@include('layout._header')
</head>
<body{{ HTML::attributes(HTML::decorate(Site::get('html::body', []), [])) }}>
	@if (Site::get('html::header.enabled', true) === true)
	@include('layout._navigation')
	@endif
	@yield('header')
	@yield('content')

	@if (Site::get('html::footer.enabled', true) === true)
	@include('layout._footer')
	@endif
</body>
</html>
