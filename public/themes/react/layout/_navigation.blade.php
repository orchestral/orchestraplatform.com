<header{!! HTML::attributes(HTML::decorate(Site::get('html::header', []), ['class' => 'navbar', 'role' => 'banner'])) !!}>
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{!! handles('app::/') !!}" class="navbar-brand">{!! memorize('site.name') !!}</a>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{!! handles('app::/') !!}">Home</a></li>
				<li><a href="{!! handles('orchestra/story::/') !!}">Blog</a></li>
				<li>
					<a href="https://www.facebook.com/groups/orchestraplatform/" target="_blank">Forum</a>
				</li>
				<li class="dropdown">
					<a href="{!! handles('app::docs/latest/') !!}" class="dropdown-toggle" data-toggle="dropdown">
						Documentation <b class="caret"></b>
					</a>

					<ul class="dropdown-menu">
						<li><a href="{!! handles('app::docs/3.0/') !!}">3.0 (Development)</a></li>
						<li><a href="{!! handles('app::docs/2.2/') !!}">2.2 (Latest Stable)</a></li>
						<li><a href="{!! handles('app::docs/2.1/') !!}">2.1 (LTS)</a></li>
						<li class="divider"></li>
						<li><a href="{!! handles('app::docs/2.0/') !!}">2.0 (Legacy)</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</header>
