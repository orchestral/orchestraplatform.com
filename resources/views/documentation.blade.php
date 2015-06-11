@extends('layouts.website')

@set_meta('html::body.attributes', ['id' => 'documentation'])

@section('content')
<section class="heading">
	<div class="container">
		<h1>{!! $version !!} documentation</h1>
	</div>
</section>
<section class="body">
	<div class="container">
		<div class="page-sidebar col-md-3">
			{!! array_get($html, 'toc') !!}
		</div>
		<div class="page-content col-md-9">
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<div class="page-header">
					<h1>{!! $document->get('title') !!}</h1>
				</div>

				@if (! is_null($badge = $document->get('badge')))
				<p>
					<a href="https://github.com/orchestral/{!! $badge !!}/releases">
						<img src="https://img.shields.io/github/tag/orchestral/{!! $badge !!}.svg?style=flat" alt="Latest Stable Version" />
					</a>
					<a href="https://packagist.org/packages/orchestra/{!! $badge !!}">
						<img src="https://img.shields.io/packagist/dt/orchestra/{!! $badge !!}.svg?style=flat" alt="Total Downloads" />
					</a>
					<a href="https://github.com/orchestral/{!! $badge !!}">
						<img src="https://img.shields.io/packagist/l/orchestra/{!! $badge !!}.svg?style=flat" alt="MIT License" />
					</a>
                    <iframe src="https://ghbtns.com/github-btn.html?user=orchestral&repo={!! $badge !!}&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px"></iframe>
				</p>
				@endif
				{!! array_get($html, 'document') !!}
			</div>
		</div>
	</div>
</section>
@stop
