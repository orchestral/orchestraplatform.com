<section id="packages">
	<div class="container">
		<header class="section-header">
			<h4>Orchestra Packages</h4>
			<hr>
		</header>
		<ul class="list-inline package-list">
			@foreach ($packages as $package)
			<li>
				<div class="item {{ implode(' ', array_get($package, 'type')) }}">
					<h4>/<a href="{{ handles('app::docs/latest/component/'.array_get($package, 'name')) }}">{{ array_get($package, 'name') }}</a></h4>
					<hr>
					<p>{{ array_get($package, 'description') }}</p>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</section>
