<html>
	<head>
		@title('File not found')
		<link href='https://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link href="{!! asset('resources/css/errors.css') !!}" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">File not found</div>
				@if (Foundation::is('app::docs/*'))
					#{{ $version = get_meta('doc:version', 'latest') }}
					<p>Let head back to the <a href="{!! handles("app::docs/{$version}/") !!}">documentation root</a>.</p>
				@else
					<p>Let head back to the <a href="{!! handles('app::/') !!}">homepage</a>.</p>
				@endif
			</div>
		</div>
	</body>
</html>
