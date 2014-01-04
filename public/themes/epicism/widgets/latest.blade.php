<div class="one_quarter widget">
    <h6>Latest News</h6>
    <ul>
    @foreach ($posts as $post)
        <li><a href="{{ $post->link }}">{{ $post->title }}</a></li>
    @endforeach
    </ul>
</div>
