@extends('layout.master')

<? Site::set('html', ['class' => 'not-found-page']); ?>
<? Site::set('html::body', ['id' => 'not-found', 'class' => 'not-found-page']); ?>
<? Site::set('html::header.enabled', false); ?>
<? Site::set('html::footer.enabled', false); ?>

@section('content')
<div class="info">
    <h1>404</h1>
    <p>The page you're looking for doesn't exist.</p>

    <p class="go-back">
        Continue to our <a href="{{ handles('app::/') }}">Home page</a>.
    </p>
</div>
<div id="container">
</div>
@stop
