@extends('layouts.page')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
@stop

@section('title', 'Editar perfil')
@section('content_title')
    <h1>
        Editar perfil
        <small>Dados do usuário corrente</small>
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

                <form method="POST" action="{{ route('profile.update') }}">
                    {!! csrf_field() !!}

                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('template.fields.name') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="{{ trans('template.fields.name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('surname') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('template.fields.surname') }}</label>
                            <input type="text" name="surname" class="form-control" value="{{ $user->profile->surname }}" placeholder="{{ trans('template.fields.surname') }}">
                            @if ($errors->has('surname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label for="gender">{{ trans('template.fields.gender') }}</label>
                            <div>
                                <label>
                                    <input type="radio" name="gender" class="minimal" value="M" {{ $user->profile->gender == 'M' ? 'checked' : '' }}>
                                    {{ trans('template.fields.gender_male') }}
                                </label>
                                <br>
                                <label>
                                    <input type="radio" name="gender" class="minimal" value="F" {{ $user->profile->gender == 'F' ? 'checked' : '' }}>
                                    {{ trans('template.fields.gender_female') }}
                                </label>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('template.fields.address') }}</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->profile->address }}" placeholder="{{ trans('template.fields.address') }}">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('about_me') ? 'has-error' : '' }}">
                            <label for="about_me">{{ trans('template.fields.about_me') }}</label>
                            <textarea name="about_me" class="form-control" placeholder="{{ trans('template.fields.about_me') }}" cols="30" rows="10">{{ $user->profile->about_me }}</textarea>
                            @if ($errors->has('about_me'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about_me') }}</strong>
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

@section('scripts')
    <script src="{{ asset('plugins/iCheck/icheck.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                radioClass: 'iradio_minimal-blue'
            });
        });
    </script>
@stop