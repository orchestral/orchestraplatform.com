<header class="main-header">
	<a href="{{ handles('orchestra::/') }}" class="logo">{{ memorize('site.name') }}</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		@yield('navbar')

		<?php $user = app('auth')->user(); ?>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				@if (! is_null($user))
				<?php $avatar = app('orchestra.avatar')->user($user); ?>
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ $avatar }}" class="user-image" alt="User Image"/>
						<span class="hidden-xs">{{ $user->fullname }}</span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="{{ $avatar }}" class="img-circle" alt="User Image" />
							<p>{{ $user->fullname }}<small>{{ $user->email }}</small></p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="{{ handles('orchestra::account') }}" class="btn btn-default btn-flat">Profile</a>
								<a href="{{ handles('orchestra::account/password') }}" class="btn btn-default btn-flat">Password</a>
							</div>
							<div class="pull-right">
								<a href="{{ handles('orchestra::logout') }}" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
				@endif
			</ul>
		</div>
	</nav>
</header>
