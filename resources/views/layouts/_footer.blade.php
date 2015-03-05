	<footer id="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					&copy; 2014 - {{ date('Y') }} Orchestra Platform, hosted with <a href="https://www.digitalocean.com/?refcode=e1f9dab486bc" target="_blank">DigitalOcean</a>.
				</div>
				<div class="col-md-6 hidden-xs">
					<ul class="list-inline pull-right navigation">
						<li><a href="{{ handles('orchestra/story::/') }}">Blog</a></li>
						<li><a href="https://www.facebook.com/groups/orchestraplatform/" target="_blank">Forum</a></li>
						<li class="docs"><a href="{{ handles('app::docs/3.0') }}">Documentation</a></li>
						<li class="dload"><a href="#" data-toggle="modal" data-target="#download-modal">Download</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					Design by <a href="https://dribbble.com/izuddinhelmi" target="_blank">Izuddin Helmi</a>
				</div>
			</div>
		</div>
	</footer>
	@include('layouts._download')
	<script src="{{ elixir('resources/js/all.js') }}"></script>
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-39179956-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>
</body>
</html>
