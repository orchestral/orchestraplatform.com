<meta charset="UTF-8">
@title()
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

<?php $asset = app('orchestra.asset')->container('orchestra.header');

$asset->style('select2', 'packages/orchestra/foundation/components/select2/select2.css');
$asset->style('jquery-ui', 'packages/orchestra/foundation/vendor/delta/theme/jquery-ui.css');
$asset->style('bootstrap', Theme::asset('components/bootstrap/css/bootstrap.css'));
$asset->style('font-awesome', Theme::asset('components/font-awesome/css/font-awesome.css'), ['bootstrap']);
$asset->style('adminlte', Theme::asset('assets/css/style.css'), ['bootstrap']);
$asset->script('underscore', 'packages/orchestra/foundation/components/underscore/underscore.js');
$asset->script('jquery', 'packages/orchestra/foundation/components/jquery/jquery.min.js');
$asset->script('javie', 'packages/orchestra/foundation/components/javie/javie.min.js', ['jquery', 'underscore']); ?>

{!! $asset->show() !!}

<script>
Javie.ENV = "{!! app('env') !!}";
</script>

@placeholder("orchestra.layout: header")
@stack('orchestra.header')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
