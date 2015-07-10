	<footer id="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					&copy; 2014 - {{ date('Y') }} Orchestra Platform, hosted with <a href="https://www.digitalocean.com/?refcode=e1f9dab486bc" target="_blank">DigitalOcean</a>.
				</div>
				<div class="col-md-6 hidden-xs">
					<ul class="list-inline pull-right navigation">
						<li class="docs"><a href="{{ handles('app::docs/latest') }}">Documentation</a></li>
						<li><a href="{{ handles('app::plan') }}">Plan</a></li>
						<li><a href="{{ handles('orchestra/story::/') }}">Blog</a></li>
						<li><a href="https://www.facebook.com/groups/orchestraplatform/" target="_blank">Forum</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					Made with <i class="fa fa-heart"></i> BY <a href="https://dribbble.com/izuddinhelmi" target="_blank">Izuddin Helmi</a> &amp; <a href="https://github.com/crynobone" target="_blank">Mior Muhammad Zaki</a>
				</div>
			</div>
		</div>
	</footer>
	@include('partials._analytic')
	@stack('assets.footer')
</body>
</html>
