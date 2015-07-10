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
						@foreach($documentation as $version)
						<li class="{{ Foundation::is(trim($version->getURL(), '/')."*") ? "active" : "" }}">
							<a href="{{ handles($version->getURL()) }}">
								{{ $version->getCode() }} <span class="pull-right label label-{{ $version->getLabel() }}">{{ $version->getStatusName() }}</span>
							</a>
						</li>
						@endforeach
					</ul>
				</li>
				<li><a href="{{ handles('app::plan') }}"><i class="fa fa-credit-card"></i> Plan</a></li>
				<li><a href="{{ handles('orchestra/story::/') }}"><i class="fa fa-book"></i> Blog</a></li>
				<!--li><a href="#"><i class="fa fa-comments"></i> Discussion</a></li-->
			</ul>

			<!--ul class="nav navbar-nav navbar-right">
				<li><a href="#"><i class="fa fa-user"></i> Login</a></li>
			</ul-->
		</div>
	</div>
</nav>
