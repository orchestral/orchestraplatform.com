@extends('orchestra/foundation::layouts.extra')

<?php set_meta('html::body', ['class' => 'login-page']); ?>

@section('content')
<div class="login-box">
	<div class="login-logo">
		<a href="{{ handles('orchestra::/') }}">{{ memorize('site.name') }}</a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">{{ trans('orchestra/foundation::title.login') }}</p>
		<form action="{{ handles('orchestra::login') }}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
				<input type="text" name="email" value="{{ Input::old('email') }}" required="true" tabindex="1" class="form-control" placeholder="{{ trans("orchestra/foundation::label.users.email") }}">
				{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
			</div>
			<div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
				<input type="password" name="password" class="form-control" required="true" tabindex="2" class="form-control" placeholder="{{ trans('orchestra/foundation::label.users.password') }}">
				{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember" value="yes" tabindex="3"> {{ trans('orchestra/foundation::title.remember-me') }}
						</label>
					</div>
				</div>
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('orchestra/foundation::title.login') }}</button>
				</div>
			</div>
		</form>

		<a href="{{ handles('orchestra::forgot') }}">{{ trans('orchestra/foundation::title.forgot-password') }}</a>
		<br>
		@if (memorize('site.registrable', false))
		<a href="{{ handles('orchestra::register') }}" class="text-center">Register a new membership</a>
		@endif
	</div>
</div>
@stop
