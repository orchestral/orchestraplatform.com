	<footer id="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					&copy; 2014 - {{ date('Y') }} Orchestra PLatform, hosted with Digital Ocean.
				</div>
				<div class="col-md-6">
					<ul class="list-inline pull-right navigation">
						<li><a href="#">Blog</a></li>
						<li><a href="#">Forum</a></li>
						<li class="docs"><a href="#">Documentation</a></li>
						<li class="dload"><a href="#">Download</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
	<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
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
