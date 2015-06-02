<nav class="navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ handles('app::/') }}" class="navbar-brand logo">Orchestra Platform</a>
		</div>

		<div id="main-navigation" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="fa fa-code"></i> Documentation
					</a>
					<ul class="dropdown-menu" role="menu">
						<li role="presentation" class="dropdown-header">Version</li>
						<li><a href="{{ handles("app::docs/3.0/") }}">3.0 <span class="pull-right label label-success">Latest</span></a></li>
						<li><a href="{{ handles("app::docs/2.2/") }}">2.2</a></li>
						<li><a href="{{ handles("app::docs/2.1/") }}">2.1 <span class="pull-right label label-info">LTS</span></a></li>
						<li><a href="{{ handles("app::docs/2.0/") }}">2.0 <span class="pull-right label label-danger">EOL</span></a></li>
					</ul>
				</li>
				<li><a href="{{ handles('orchestra/story::/') }}"><i class="fa fa-book"></i> Blog</a></li>
				<!--li><a href="#"><i class="fa fa-comments"></i> Discussion</a></li-->
			</ul>

			<!--ul class="nav navbar-nav navbar-right">
				<li><a href="#"><i class="fa fa-user"></i> Login</a></li>
			</ul-->
		</div>
	</div>
</nav>
