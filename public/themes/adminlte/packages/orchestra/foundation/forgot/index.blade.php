@extends('orchestra/foundation::layouts.extra')

@set_meta('html::body', ['class' => 'login-page'])

@section('content')
<div class="login-box">
	<div class="login-logo">
		<a href="{!! handles('orchestra::/') !!}">{{ memorize('site.name') }}</a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">{!! trans('orchestra/foundation::title.forgot-password') !!}</p>

		{!! Form::open(['url' => handles('orchestra::forgot'), 'method' => 'POST']) !!}
			<div class="form-group has-feedback{!! $errors->has('email') ? ' has-error' : '' !!}">
				{!! Form::email('email', old('email'), [
					'required'    => true,
					'tabindex'    => '1',
					'class'       => 'form-control',
					'placeholder' => trans("orchestra/foundation::label.users.email"),
				]) !!}
				{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
			</div>
			<div class="row">
				<div class="col-xs-6"></div>
				<div class="col-xs-6">
					<button type="submit" class="btn btn-primary btn-block btn-flat">{!! get_meta('title', 'Submit') !!}</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@stop
