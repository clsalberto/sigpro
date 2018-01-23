@extends('layouts.page') @section('title', 'Turmas') @section('content_title')
<h1>
	Turmas
	<small>Turmas por município</small>
</h1>
@stop @section('sidebar') @include('partials.sidebars.sidebar-home') @stop @section('content')

<ul class="timeline">

	@if(count($rooms) > 0) @foreach ($rooms as $city_name => $rooms_details)

	<li class="time-label">
		<span class="bg-green-active">
			<i class="fa fa-map-o margin-r-5"></i> {{ $city_name }}
		</span>
	</li>

	@php $course = '' @endphp @foreach($rooms_details as $room) @if($course
	<> $room->course->name)

		<!-- timeline item -->
		<li>
			<i class="fa fa-arrow-right bg-gray"></i>
			<div class="timeline-item">
				<span class="time">
					<i class="fa fa-angle-double-right"></i> {{ $room->pact_id . '/' . $room->pact->year }}</span>
				<h3 class="timeline-header">
					<i class="fa fa-mortar-board margin-r-5"></i> {{ $room->course->name }}</h3>
				<div class="timeline-body">

					@endif

					<div class="attachment-block clearfix">
						<h5 class="attachment-heading">
							{!! '
							<strong>' . $room->id . '</strong> - ' . $room->module->description . ' (
							<strong>' . $room->shift_description . '</strong>)' !!}
						</h5>
						<div class="attachment-text">
							<div class="btn-group pull-right">
								<a href="{{ route('frequencies', $room->id) }}" class="btn btn-default btn-xs">
									<i class="fa fa-check-square-o margin-r-5 text-green"></i> Frequência</a>
								@if($room->has_formula)
								<a href="{{ route('scores.students', $room->id) }}" class="btn btn-default btn-xs">
									<i class="fa fa-bar-chart margin-r-5 text-green"></i> Notas</a>
								@else
								<a href="{{ route('formula', $room->id) }}" class="btn btn-default btn-xs">
									<i class="fa fa-bar-chart margin-r-5 text-green"></i> Notas</a>
								@endif
							</div>
						</div>
					</div>

					@php $old_course = $course @endphp @php $course = $room->course->name @endphp @endforeach @if($old_course = '')

				</div>
			</div>
		</li>
		<!-- END timeline item -->
		@endif @endforeach @endif

		<li>
			<i class="fa fa-check bg-gray"></i>
		</li>
</ul>


@endsection
