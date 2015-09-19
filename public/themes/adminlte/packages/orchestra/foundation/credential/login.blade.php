@extends('orchestra/foundation::layouts.extra')

@set_meta('html::body', ['class' => 'login-page'])

@section('content')
<div class="login-box">
	<div class="login-logo">
		<a href="{!! handles('orchestra::/') !!}">{{ memorize('site.name') }}</a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">{{ trans('orchestra/foundation::title.login') }}</p>
		{!! Form::open(['url' => handles('orchestra::login'), 'method' => 'POST']) !!}
			<div class="form-group has-feedback{!! $errors->has('email') ? ' has-error' : '' !!}">
				{!! Form::email('email', old('email'), [
					'required'    => true,
					'tabindex'    => '1',
					'class'       => 'form-control',
					'placeholder' => trans("orchestra/foundation::label.users.email")
				]) !!}
				{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
			</div>
			<div class="form-group has-feedback{!! $errors->has('password') ? ' has-error' : '' !!}">
				{!! Form::password('password', [
					'required'    => true,
					'tabindex'    => '2',
					'class'       => 'form-control',
					'placeholder' => trans('orchestra/foundation::label.users.password'),
				]) !!}
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox">
						<label>
							{!! Form::checkbox('remember', 'yes', null, ['tabindex' => '3']) !!} {{ trans('orchestra/foundation::title.remember-me') }}
						</label>
					</div>
				</div>
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('orchestra/foundation::title.login') }}</button>
				</div>
			</div>
		{!! Form::close() !!}

		<a href="{!! handles('orchestra::forgot') !!}">{{ trans('orchestra/foundation::title.forgot-password') }}</a>
		<br>
		@if(memorize('site.registrable', false))
		<a href="{!! handles('orchestra::register') !!}" class="text-center">Register a new membership</a>
		@endif
	</div>
</div>
@stop
