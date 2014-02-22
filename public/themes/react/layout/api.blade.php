<!DOCTYPE html>
<html>
<head>
	@include('layout._header')
</head>
<body{{ HTML::attributes(HTML::decorate(Site::get('html::body', []), [])) }}>
	@include('layout._navigation')
	@yield('content')
	@include('layout._footer')
</body>
</html>
