@extends('layouts.page')

@section('title', 'Perfil')
@section('content_title')
    <h1>
        Perfil
        <small>Informações do usuário corrente</small>
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
                    <h3 class="box-title">Informações</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <strong><i class="fa fa-user margin-r-5"></i> Nome completo</strong>
                    <p class="text-muted">
                        {{ $user->full_name }}
                    </p>
                    <hr>
                    <strong><i class="fa fa-intersex margin-r-5"></i> Gênero</strong>
                    <p class="text-muted">
                        {{ $user->profile->gender == 'M' ? 'Masculino' : 'Feminino' }}
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-o margin-r-5"></i> Endereço</strong>
                    <p class="text-muted">
                        {{ $user->profile->address }}
                    </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection