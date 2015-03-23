@extends('orchestra/foundation::layouts.main')

@section('content')
<div class="row">
    <div class="eight columns">
        {!! $form !!}
    </div>
    <div class="four columns">
        @placeholder('orchestra.settings')
        @placeholder('orchestra.helps')
    </div>
</div>
@stop

@push('orchestra.footer')
@include('orchestra/foundation::settings._script')
@endpush
