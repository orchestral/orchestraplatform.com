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
							<li><a href="{{ handles("app::docs/3.0/") }}">3.0 <span class="pull-right label label-success">Latest</span></a></li>
							<li><a href="{{ handles("app::docs/2.2/") }}">2.2</a></li>
							<li><a href="{{ handles("app::docs/2.1/") }}">2.1 <span class="pull-right label label-info">LTS</span></a></li>
							<li><a href="{{ handles("app::docs/2.0/") }}">2.0 <span class="pull-right label label-danger">EOL</span></a></li>
						</ul>
					</li>
					<li class="dload"><a href="#" data-toggle="modal" data-target="#download-modal">Download</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>
