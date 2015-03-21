<!DOCTYPE html>
<html>
<head>
	@include('orchestra/foundation::layouts._header')
</head>
<body{!! HTML::attributes(HTML::decorate(get_meta('html::body', []), ['class' => get_meta('ADMINLTE::SKIN')])) !!}>
	<div class="wrapper">
		@include('orchestra/foundation::layouts.main._header')
		@include('orchestra/foundation::layouts.main._navigation')
		<div class="content-wrapper">
			@include('orchestra/foundation::components.header')
			<section class="content">
				@include('orchestra/foundation::components.messages')
				@yield('content')
			</section>
		</div>
		@include('orchestra/foundation::layouts.main._footer')
		@include('orchestra/foundation::layouts._footer')
	</div>
</body>
</html>
