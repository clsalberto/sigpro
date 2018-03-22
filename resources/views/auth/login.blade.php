@extends('layouts.app')

@section('body_class', 'login-page')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    @yield('styles')
@stop

@section('title', 'Login')

@section('body')

    <div class="login-box">

        <div class="login-logo">
            <a href="{{ route('home') }}">{!! config('template.logo') !!}</a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('template.messages.login_message') }}</p>
            <form method="POST" action="{{ route('login') }}">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus="true" placeholder="{{ trans('template.fields.email') }}">
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

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember">
                                <span class="text">{{ trans('template.fields.remember_me') }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('template.buttons.log_in') }}</button>
                    </div>
                </div>
            </form>
            <div class="auth-links">
                <a href="{{ route('password.request') }}">{{ trans('template.links.i_forgot_my_password') }}</a><br>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('plugins/iCheck/icheck.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            });
        });
    </script>
@stop
