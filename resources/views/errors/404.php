<html>
	<head>
		<?php echo HTML::title('File not found'); ?>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link href="<?php echo asset('resources/css/errors.css'); ?>" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">File not found</div>
				<p>Let head back to the <a href="<?php echo handles('app::/'); ?>">homepage</a>.</p>
			</div>
		</div>
	</body>
</html>
