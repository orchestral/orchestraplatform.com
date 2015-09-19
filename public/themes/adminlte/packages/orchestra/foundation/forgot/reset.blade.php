@extends('orchestra/foundation::layouts.extra')

@set_meta('html::body', ['class' => 'login-page'])

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{!! handles('orchestra::/') !!}">{{ memorize('site.name') }}</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">{!! trans('orchestra/foundation::title.reset-password') !!}</p>
        {!! Form::open(['url' => handles('orchestra::forgot/reset'), 'method' => 'POST']) !!}
            {!! Form::hidden('token', $token) !!}
            <div class="form-group has-feedback{!! $errors->has('email') ? ' has-error' : '' !!}">
                {!! Form::email('email', old('email'), [
                    'required'    => true,
                    'tabindex'    => '1',
                    'class'       => 'form-control',
                    'placeholder' => trans('orchestra/foundation::label.users.email'),
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
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group has-feedback{!! $errors->has('password_confirmation') ? ' has-error' : '' !!}">
                {!! Form::password('password_confirmation', [
                    'required'    => true,
                    'tabindex'    => '3',
                    'class'       => 'form-control',
                    'placeholder' => trans('orchestra/foundation::label.account.confirm_password'),
                ]) !!}
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
