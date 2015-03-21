<!DOCTYPE html>
<html>
<head>
	@include('orchestra/foundation::layouts._header')
</head>
<body{!! HTML::attributes(HTML::decorate(get_meta('html::body', []), ['class' => get_meta('ADMINLTE::SKIN')])) !!}>
	@include('orchestra/foundation::components.messages')
	@yield('content')
	@include('orchestra/foundation::layouts._footer')
</body>
</html>
