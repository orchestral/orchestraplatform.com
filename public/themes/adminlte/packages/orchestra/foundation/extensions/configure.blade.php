@extends('orchestra/foundation::layouts.main')

@section('content')
<div class="row">
    <div class="eight columns">
        {!! $form !!}
    </div>
    <div class="four columns">
        @placeholder('orchestra.extensions')
        @placeholder('orchestra.helps')
    </div>
</div>
@stop
