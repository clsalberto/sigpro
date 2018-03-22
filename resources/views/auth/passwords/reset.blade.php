@extends('layouts.app')

@section('body_class', 'login-page')

@section('stylesheets')
    @yield('styles')
@stop

@section('title', 'Redefinição de senha')

@section('body')

    <div class="login-box">

        <div class="login-logo">
            <a href="{{ route('home') }}">{!! config('template.logo') !!}</a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('template.messages.password_reset_message') }}</p>
            <form method="POST" action="{{ route('password.request') }}">
                {!! csrf_field() !!}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}" placeholder="{{ trans('template.fields.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="{{ trans('template.fields.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('template.fields.password_confirmation') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('template.buttons.reset_password') }}</button>
            </form>
        </div>
    </div>

@endsection
