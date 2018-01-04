@extends('layouts.page')

@section('title', 'Frequências')
@section('content_title')
    <h1>
        Frequências
        <small>Frequência por data</small>
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
                    <th class="col-md-6">Data</th>
                    <th class="col-md-2">Avaliação?</th>
                    <th class="col-md-3"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dates as $date)
                    <tr>
                        <td>{{ $date->id }}</td>
                        <td>{!! format_date($date->class_date) !!}</td>
                        <td>{!! $date->avaliation ? '<small class="label label-success">Sim</small>' : '<small class="label label-default">Não</small>' !!}</td>
                        <td>
                            <div class="btn-group">
                                @if($date->has_content)
                                    <a href="{{ route('content.show', [$room->id, $date->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-cog"></i> Conteúdos </a>
                                    <a href="{{ route('frequencies.students', [$room->id, $date->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-check"></i> Lançar Frequência </a>
                                @else
                                    <a href="{{ route('content', [$room->id, $date->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-cog"></i> Conteúdos </a>
                                @endif
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

