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
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}" placeholder="{{ trans('template.fields.email') }}">
                    <span class="fa fa-user form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('template.buttons.send_password_reset_link') }}</button>
            </form>
        </div>
    </div>

@endsection
