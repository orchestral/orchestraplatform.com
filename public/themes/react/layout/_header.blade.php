<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
{!! HTML::title() !!}
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- stylesheets -->
<?php

$asset = Asset::container('frontend');
$asset->style('bootstrap', 'packages/orchestra/foundation/vendor/bootstrap/css/bootstrap.min.css', []);
$asset->style('theme', Theme::asset('assets/css/theme.css'), ['bootstrap']);
$asset->style('custom', Theme::asset('assets/css/custom.css'), ['theme']);

$asset->script('jquery', 'packages/orchestra/foundation/components/jquery/jquery.min.js', []);
$asset->script('bootstrap', 'packages/orchestra/foundation/vendor/bootstrap/js/bootstrap.min.js', ['jquery']);
$asset->script('prettify', Theme::asset('assets/js/prettify.js'), ['jquery']);
$asset->script('theme', Theme::asset('assets/js/theme.js'), ['bootstrap', 'prettify']); ?>

{!! $asset->scripts() !!}
{!! $asset->styles() !!}
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
