@extends('layouts.page')

@section('title', 'Turmas')
@section('content_title')
    <h1>
        Turmas
        <small>Turmas por usuário</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')

    <div class="box box-success">

        <!-- /.box-body -->
        <div class="box-body">
            <ul class="timeline timeline-inverse">
            @if(count($rooms) > 0)
                @foreach ($rooms as $room)
                    <!-- timeline item -->
                        <li>
                            <i class="fa fa-arrow-right bg-green"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-map-o"></i> {{ $room->city->name }}</span>
                                <span class="time"><i class="fa fa-certificate"></i> {{ $room->pact_id . '/' . $room->pact->year }}</span>
                                <h3 class="timeline-header">{{ $room->course->name }}</h3>
                                <div class="timeline-body">
                                    {{ $room->id . ' - ' . $room->module->description }}
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('frequencies', $room->id) }}" class="btn btn-default btn-xs"><i class="fa fa-check-square-o"></i> Frequência</a>
                                        <a href="{{ route('scores', $room->id) }}" class="btn btn-default btn-xs"><i class="fa fa-bar-chart"></i> Notas</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                    @endforeach
                @endif
                <li>
                    <i class="fa fa-check bg-gray"></i>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>

@endsection