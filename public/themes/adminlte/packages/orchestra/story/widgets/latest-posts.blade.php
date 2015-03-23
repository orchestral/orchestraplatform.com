<div class="box-footer no-padding">
	<ul class="nav nav-pills nav-stacked">
		@foreach ($posts as $post)
		<li><a href="{!! $post->link !!}" class="list-group-item">{!! $post->title !!}</a></li>
		@endforeach
	</ul>
</div>
