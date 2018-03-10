@extends('layouts.page')

@section('title', trans('template.titles.users'))
@section('content_title')
    <h1>
        {{ trans('template.titles.users') }}
        <small>{{ trans('template.titles.users_description') }}</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')
    <div class="box box-success">

        <!-- /.box-header -->
        <div class="box-header">
            <h3 class="box-title">{{ trans('template.titles.users') }}</h3>
            @can('create-users', $users)
                <a href="{{ route('user.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo</a>
            @endcan
        </div>
        <!-- /.box-header -->

        <!-- /.box-body -->
        <div class="box-body">
            @can('view-users', $users)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-1">ID</th>
                            <th class="col-md-8">Nome</th>
                            <th class="col-md-2">Tipo</th>
                            <th class="col-md-1">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        @if ($user->has_logged)
                                            <small class="label pull-right bg-green">Logado</small>
                                        @else
                                            <small class="label pull-right bg-danger">Deslogado</small>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">{{ 'Registros: ' . count($users) }}</th>
                        </tr>
                    </tfoot>
                </table>
            @endcan
        </div>
        <!-- /.box-body -->

    </div>
@endsection