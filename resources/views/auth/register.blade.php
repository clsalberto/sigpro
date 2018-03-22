@extends('layouts.app')

@section('body_class', 'register-page')

@section('stylesheets')
    @yield('styles')
@stop

@section('title', 'Registro de usuário')

@section('body')

    <div class="register-box">

        <div class="register-logo">
            <a href="{{ route('home') }}">{!! config('template.logo') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('template.messages.register_message') }}</p>
            <form method="POST" action="{{ route('register') }}">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="{{ trans('template.fields.first_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{ trans('template.fields.email') }}">
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

                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('template.buttons.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ route('login') }}" class="text-center">{{ trans('template.links.i_already_have_a_user') }}</a>
            </div>
        </div>

    </div>

@endsection
