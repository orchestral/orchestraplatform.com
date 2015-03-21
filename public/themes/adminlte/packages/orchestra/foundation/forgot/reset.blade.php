@extends('orchestra/foundation::layouts.extra')

<?php set_meta('html::body', ['class' => 'login-page']); ?>

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ handles('orchestra::/') }}">{{ memorize('site.name') }}</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">{!! trans('orchestra/foundation::title.reset-password') !!}</p>
        <form action="{{ handles('orchestra::forgot/reset') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{!! $token !!}">
            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" name="email" value="{{ Input::old('email') }}" required="true" tabindex="1" class="form-control" placeholder="{{ trans("orchestra/foundation::label.users.email") }}">
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" class="form-control" required="true" tabindex="2" class="form-control" placeholder="{{ trans('orchestra/foundation::label.users.password') }}">
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" required="true" tabindex="3" class="form-control" placeholder="{{ trans('orchestra/foundation::label.account.confirm_password') }}">
                {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{!! get_meta('title', 'Submit') !!}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
