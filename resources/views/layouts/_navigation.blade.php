<header id="main-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="{{ handles('app::/') }}" id="branding">Orchestra Platform</a>
			</div>
			<div class="col-md-8">
				<ul class="list-inline pull-right navigation">
					<li><a href="{{ handles('orchestra/story::/') }}">Blog</a></li>
					<li><a href="#">Forum</a></li>
					<li class="docs dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							Documentation <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li role="presentation" class="dropdown-header">Version</li>
							@foreach (['3.0', '2.2', '2.1', '2.0'] as $version)
							<li><a href="{{ handles("app::docs/{$version}/") }}">{{ $version }}</a></li>
							@endforeach
						</ul>
					</li>
					<li class="dload"><a href="#">Download</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>
