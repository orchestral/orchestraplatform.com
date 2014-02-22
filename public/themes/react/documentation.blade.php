@extends('layout.api')

<?

Site::set('html::body', ['id' => 'docs']);
Site::set('html::header', ['class' => 'navbar-inverse normal']); ?>

@section('content')
<div id="toc" class="col-sm-2">
	{{ $toc->getHtmlContent() }}
</div>
<div id="content" class="col-sm-10">
	<div class="page-header">
		<h1>{{ $document->get('title') }} <small>{{ $version }} documentation</small></h1>
	</div>
	{{ $document->getHtmlContent() }}
</div>
</div>

<script>
jQuery(function (app) {
	var doc, viewport;
	doc = app(document);

	viewport = function () {
		var height = doc.height();

		if (doc.width() >= 768) {
			app('#toc').css('height', height+'px');
		} else {
			app('#toc').css('height', null);
		}
	};
	$(window).resize(viewport);
	viewport();
});
</script>
@stop
