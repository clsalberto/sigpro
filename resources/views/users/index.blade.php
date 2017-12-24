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
            <a href="{{ route('user.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <!-- /.box-header -->

        <!-- /.box-body -->
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-9">Nome</th>
                        <th class="col-md-2">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users) > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name . ' ' . $user->profile->surname }}</td>
                                <td>{{ $user->role->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">{{ 'Registros: ' . count($users) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->

    </div>
@endsection