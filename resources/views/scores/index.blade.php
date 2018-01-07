@extends('layouts.page')


@section('title', 'Notas')
@section('content_title')
    <h1>
        Notas
        <small>Notas por data</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')

    <div class="box box-success">

        <!-- /.box-header -->
        <div class="box-header">
            <h3 class="box-title">{{ $room->course->name }} <br>
            <small>{{ $room->module->description }}</small></h3>
        </div>
        <!-- /.box-header -->

        <!-- /.box-body -->
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-8">Data</th>
                    <th class="col-md-2">Avaliação?</th>
                    <th class="col-md-1"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dates as $date)
                        <tr>
                            <td>{{ $date->id }}</td>
                            <td>{!! format_date($date->class_date) !!}</td>
                            <td>
                                @if($date->avaliation)
                                    <a href="{{ route('disable.score', [$room->id, $date->id]) }}">
                                        <small class="label label-success">Sim</small>
                                    </a>
                                @else
                                    <a href="{{ route('enable.score', [$room->id, $date->id]) }}">
                                        <small class="label label-default">Não</small>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('scores.students', [$room->id, $date->id]) }}" class="btn btn-default btn-xs">
                                        <i class="fa fa-check"></i> Lançar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">{{ 'Registros: ' . count($dates) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->

    </div>

@endsection

