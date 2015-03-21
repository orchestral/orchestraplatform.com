<?php $asset = app('orchestra.asset')->container('orchestra/foundation::footer');

$asset->script('bootstrap', 'packages/orchestra/foundation/vendor/bootstrap/js/bootstrap.min.js');
$asset->script('jquery-ui', 'packages/orchestra/foundation/vendor/jquery.ui/jquery.ui.js');
$asset->script('orchestra', 'packages/orchestra/foundation/js/orchestra.min.js', ['bootstrap', 'jquery-ui']);
$asset->script('jui-toggleSwitch', 'packages/orchestra/foundation/vendor/delta/js/jquery-ui.toggleSwitch.js', ['jquery-ui']);
$asset->script('select2', 'packages/orchestra/foundation/components/select2/select2.min.js');
$asset->script('app', Theme::asset('components/adminlte/js/app.min.js'), ['bootstrap']) ?>

{!! $asset->show() !!}

@placeholder("orchestra.layout: footer")

<script>
jQuery(function onPageReady($) { 'use strict';
    var dispatcher = Javie.make('event');
    dispatcher.fire("orchestra.ready: {!! app('request')->path() !!}");
});
</script>

@stack('orchestra.footer')
