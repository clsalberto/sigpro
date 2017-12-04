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

    <ul class="timeline">
        @if(count($rooms) > 0)
            @foreach ($rooms as $city_name => $rooms_details)

                <li class="time-label">
                  <span class="bg-green-active">
                    <i class="fa fa-map-o margin-r-5"></i> {{ $city_name }}
                  </span>
                </li>

                @php $course = '' @endphp

                @foreach($rooms_details as $room)

                    @if($course <> $room->course->name)

                    <li class="time-label">
                      <span class="bg-gray">
                        <i class="fa fa-book margin-r-5"></i> {{ $room->course->name }}
                      </span>
                    </li>

                    @endif
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-arrow-right bg-gray"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-angle-double-right"></i> {{ $room->pact_id . '/' . $room->pact->year }}</span>
                            <h3 class="timeline-header">{{ $room->id . ' - ' . $room->module->description }}</h3>
                            <div class="timeline-body">
                                <div class="btn-group   ">
                                    <a href="{{ route('frequencies', $room->id) }}" class="btn btn-default btn-xs"><i class="fa fa-check-square-o margin-r-5"></i> Frequência</a>
                                    <a href="{{ route('scores', $room->id) }}" class="btn btn-default btn-xs"><i class="fa fa-bar-chart margin-r-5"></i> Notas</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->

                    @php $course = $room->course->name @endphp


                @endforeach
            @endforeach
        @endif
        <li>
            <i class="fa fa-check bg-gray"></i>
        </li>
    </ul>

@endsection