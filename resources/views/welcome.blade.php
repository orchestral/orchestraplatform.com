@extends('layouts.website')

@section('content')
<section id="hero" class="text-center">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h1><span>Orchestra Platform</span> provide all the boilerplate for your application, so you can create awesomeness.</h1>
			<div>
				<a class="btn btn-dload">Download</a>
				<a class="btn btn-docs">Documentation</a>
			</div>
		</div>
	</div>
	<img src="img/chrome@2x.png" width="956">
</section>
<section id="features">
	<div class="container">
		<div class="section-header">
			<h2>Accomplish more with Orchestra Platform</h2>
			<p class="lead">Built from 17 components that utilize all the best tool available with Laravel 4 and PHP</p>
		</div>
		<div class="row">
			<div class="col-md-4 item media">
				<div class="media-object pull-left">
					<img src="img/icon-laravel.svg">
				</div>
				<div class="media-body">
					<h3 class="media-heading">Laravel Framework</h3>
					<hr>
					<p>Craft beer vinyl Intelligentsia, keytar occupy cred kitsch cornhole flannel High Life Etsy ugh</p>
				</div>
			</div>
			<div class="col-md-4 item media">
				<div class="media-object pull-left">
					<img src="img/icon-extensions.svg">
				</div>
				<div class="media-body">
					<h3 class="media-heading">Extensions</h3>
					<hr>
					<p>Extensions are a much needed improvement to package implementation in Laravel. With one click activation and upgrade (migration and publish).</p>
				</div>
			</div>
			<div class="col-md-4 item media">
				<div class="media-object pull-left">
					<img src="img/icon-database.svg">
				</div>
				<div class="media-body">
					<h3 class="media-heading">Database Based Configuration</h3>
					<hr>
					<p>For any extensions are a solid replacement of file based configuration, stop telling your non-technical client to edit PHP file for any simple configuration changes.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 item media">
				<div class="media-object pull-left">
					<img src="img/icon-resources.svg">
				</div>
				<div class="media-body">
					<h3 class="media-heading">Resources</h3>
					<hr>
					<p>Lets you build HMVC implementation on top of Orchestra Platform. Hook your backend application to Orchestra with just simple API.</p>
				</div>
			</div>
			<div class="col-md-4 item media">
				<div class="media-object pull-left">
					<img src="img/icon-acl.svg">
				</div>
				<div class="media-body">
					<h3 class="media-heading">ACL &amp; User Management</h3>
					<hr>
					<p>Lets stop reinventing the wheel and let Orchestra Platform do its magic. If you need something more advanced, there are more than 20 events that you can hook into your own implementation without overwriting Orchestra Platform core file.</p>
				</div>
			</div>
			<div class="col-md-4 item media">
				<div class="media-object pull-left">
					<img src="img/icon-responsive.svg">
				</div>
				<div class="media-body">
					<h3 class="media-heading">Responsive Design</h3>
					<hr>
					<p>Beard forage literally, locavore mlkshk crucifix freegan tofu tilde chia small batch Bushwick pop-up umami stumptown</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<blockquote>Orchestra Platform is basically an admin panel that handle extension (Laravel packages that you can enable/disable as how you would with WP plugin) and user management. Basically it is build using multiple small packages that you could either use alone as Laravel package or together as Orchestra Platform.</blockquote>
			</div>
		</div>
	</div>
</section>
<section id="packages">
	<div class="container">
		<header class="section-header">
			<h4>Orchestra Packages</h4>
			<hr>
		</header>
		<ul class="list-inline package-list">
			<li>
				<div class="item">
					<h4>/Asset</h4>
					<hr>
					<p>Managing asset (not asset pipeline) but instead mainly handle asset dependency and handle asset injection from extension.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Auth</h4>
					<hr>
					<p>Authentication and Role/Resource based ACL.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Debug</h4>
					<hr>
					<p>Debugging and some profilling tool.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Extension</h4>
					<hr>
					<p>Handling extension (plugins).</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Facile</h4>
					<hr>
					<p>Handling unified responses as either html (view), json, csv.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Foundation</h4>
					<hr>
					<p>The http handling that map all other packages together.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/HTML</h4>
					<hr>
					<p>HTML, Form, Table generator which you can inject additional items from extensions.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Memory</h4>
					<hr>
					<p>DB configuration that knows your enabled extension, current theme, ACL metrics.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Messages</h4>
					<hr>
					<p>Notification (flash messages).</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Model</h4>
					<hr>
					<p>Model for Orchestra Platform usage (users, roles with some observers for ACL usage).</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Optimize</h4>
					<hr>
					<p>Engine to compile most of reusable class to bootstrap/compiled.php (you now has the option to do this from package service provider).</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Publisher</h4>
					<hr>
					<p>Handle migration and asset publishing for extension.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Memory</h4>
					<hr>
					<p>DB configuration that knows your enabled extension, current theme, ACL metrics.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Memory</h4>
					<hr>
					<p>DB configuration that knows your enabled extension, current theme, ACL metrics.</p>
				</div>
			</li>
			<li>
				<div class="item">
					<h4>/Memory</h4>
					<hr>
					<p>DB configuration that knows your enabled extension, current theme, ACL metrics.</p>
				</div>
			</li>
		</ul>
	</div>
</section>
<!-- <section id="screenshots" class="text-center">
	<ul class="list-inline">
		<li><img src="img/browser.png"></li>
		<li><img src="img/browser.png"></li>
		<li><img src="img/browser.png"></li>
	</ul>
</section> -->
<section id="testimonial">
	<div class="container">
		<div class="col-md-6 col-md-offset-3 text-center">
			<ul class="list-inline">
				<li><img src="img/avatar2.png" width="62"></li>
				<li><img src="img/avatar3.png" width="62"></li>
				<li class="active"><img src="img/avatar.png" width="62"></li>
				<li><img src="img/avatar4.png" width="62"></li>
				<li><img src="img/avatar5.png" width="62"></li>
			</ul>
			<div class="item">
				<h3>Stephanie</h3>
				<hr>
				<p>Distillery drinking vinegar blog, hella bicycle rights tousled craft beer mustache hashtag mixtape Echo Park banjo quinoa tote bag kale chips. Umami art party polaroid, Vice deep v viral roof party.</p>
			</div>
		</div>
	</div>
</section>
<section id="videos">
	<div class="container">
		<header class="section-header">
			<h3>Learn Orchestra</h3>
		</header>
		<div class="row">
			<div class="col-md-3 item">
				<h3>Orchestra Installation</h3>
				<hr>
				<img src="img/video-thumbnail.svg">
				<p>4:12</p>
			</div>
			<div class="col-md-3 item">
				<h3>Story CMS Extension Review</h3>
				<hr>
				<img src="img/video-thumbnail.svg">
				<p>4:12</p>
			</div>
			<div class="col-md-3 item">
				<h3>FTP Publishing</h3>
				<hr>
				<img src="img/video-thumbnail.svg">
				<p>4:12</p>
			</div>
			<div class="col-md-3 item more">
				<img src="img/icon-video.svg">
				<h3>View more videos</h3>
			</div>
		</div>
	</div>
</section>
@stop
