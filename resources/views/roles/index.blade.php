@extends('layouts.page')

@section('title', 'Tipos')
@section('content_title')
    <h1>
        Tipos
        <small>Tipos de usuários</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')
    <div class="box box-success">

        <!-- /.box-header -->
        <div class="box-header">
            <h3 class="box-title">Tipos</h3>
            <a href="{{ route('role.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <!-- /.box-header -->

        <!-- /.box-body -->
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-10">Nome</th>
                        <th class="col-md-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($roles) > 0)
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-edit margin-r-5 text-green"></i> Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">{{ 'Registros: ' . count($roles) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->

    </div>
@endsection