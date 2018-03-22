@extends('layouts.page')

@section('title', 'Editar password')
@section('content_title')
    <h1>
        Editar password
        <small>Dados de acesso do usuário corrente</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatars/' . $user->avatar) }}" alt="User profile picture">
                    <h3 class="profile-username text-center">{{  $user->name }}</h3>
                    <p class="text-muted text-center">{{ $user->role->name }}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('template.fields.about_me') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>{{ $user->profile->about_me }}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-9">
            <!-- About Me Box -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Dados</h3>
                </div>

                <form method="POST" action="{{ route('password.update') }}">
                {!! csrf_field() !!}

                <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
                            <label for="current_password">{{ trans('template.fields.current_password') }}</label>
                            <input type="password" name="current_password" class="form-control" placeholder="{{ trans('template.fields.current_password') }}">
                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                            <label for="new_password">{{ trans('template.fields.new_password') }}</label>
                            <input type="password" name="new_password" class="form-control" placeholder="{{ trans('template.fields.new_password') }}">
                            @if ($errors->has('new_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                            <label for="new_password_confirmation">{{ trans('template.fields.password_confirmation') }}</label>
                            <input type="password" name="new_password_confirmation" class="form-control" placeholder="{{ trans('template.fields.password_confirmation') }}">
                            @if ($errors->has('new_password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('profile') }}" class="btn btn-default">{{ trans('template.buttons.cancel') }}</a>
                        <button type="submit" class="btn btn-success pull-right">{{ trans('template.buttons.register') }}</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection