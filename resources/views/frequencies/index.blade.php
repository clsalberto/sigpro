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

	<div class="nav-tabs-custom">
		<!-- Tabs within a box -->
		<ul class="nav nav-tabs pull-right">

			@php $month = '' @endphp
			@foreach ($dates as $date)
				@php $active = (date("mY", strtotime($date->class_date)) == date("mY")) ? ' active' : '' @endphp
				@if($month <> date("mY", strtotime($date->class_date)))
					<li class="{{ $active }}"><a href="#{{ mb_strtolower(format_date_name($date->class_date, true)) }}" data-toggle="tab">{!! format_date_name($date->class_date, true, true) !!}</a></li>
				@endif
				@php $month = date("mY", strtotime($date->class_date)) @endphp
			@endforeach

			<li class="pull-left box-header">
				<h3 class="box-title">{{ $room->course->name }}</h3>
                <div class="clearfix">
                    <span>{{ $room->module->description }}</span>
                </div>
                <div class="progress sm active" style="margin-bottom: 0px;">
                    <div class="progress-bar progress-bar-success progress-bar-striped" style="width: {{ $room->percent($room->totalActived(), count($dates)) . '%' }};"></div>
                </div>
                <div class="clearfix">
                	<small class="pull-right">{{ $room->percent($room->totalActived(), count($dates)) . '%' }}</small>
                </div>
			</li>
		</ul>
		<div class="tab-content">

			@php $month = '' @endphp
			@php $inc = 1 @endphp
			@foreach ($dates as $date)

				@php $active = (date("mY", strtotime($date->class_date)) == date("mY")) ? ' active' : '' @endphp

				@if($month <> date("mY", strtotime($date->class_date)))
					<div class="tab-pane{{ $active }}" id="{{ mb_strtolower(format_date_name($date->class_date, true)) }}">

						<div class="clearfix">
			                <small class="pull-right">
			                	{!! '(<b>' . 	$date->hoursMonth($room->id, date("m", strtotime($date->class_date)), date("Y", strtotime($date->class_date))) . '</b> de <b>' . $date->totalHours($room->id) . '</b> Horas)' !!}
			                </small>
			            </div>

						<table class="table table-hover">
							<thead>
								<tr>
									<th class="col-md-1">ID</th>
									<th class="col-md-7">Data</th>
									<th class="col-md-1">Horas</th>
									<th class="col-md-3"></th>
								</tr>
							</thead>
							<tbody>
				@endif

								<tr>
									<td>{{ $date->id }}</td>
									<td>{!! format_date($date->class_date) !!}</td>
									<td>{{ $date->workload }}</td>
									<td>
										@can('view-frequencies', $date)
											<div class="btn-group">
												@if($date->has_content)
												<a href="{{ route('content.show', [$room->id, $date->id]) }}" class="btn btn-default btn-xs">
													<i class="fa fa-cog text-green"></i> Conteúdos </a>
												<a href="{{ route('frequencies.students', [$room->id, $date->id]) }}" class="btn btn-default btn-xs">
													<i class="fa fa-check text-green"></i> Lançar Frequência </a>
												@else
													@if($date->class_date > date('Y-m-d'))
														<button class="btn btn-default btn-xs" disabled>
															<i class="fa fa-cog text-green"></i> Conteúdos
														</button>
													@else
														<a href="{{ route('content', [$room->id, $date->id]) }}" class="btn btn-default btn-xs">
															<i class="fa fa-cog text-green"></i> Conteúdos
														</a>
													@endif
												@endif
											</div>
										@endcan
									</td>
								</tr>

				@if(date("Y-m-d", strtotime($date->class_date)) == date("Y-m-t", strtotime($date->class_date)) || $inc == count($dates))

							</tbody>
							<tfoot>
								<tr>
									<th colspan="4">{{ 'Registros: ' . count($dates) }}</th>
								</tr>
							</tfoot>
						</table>
					</div>

				@endif

				@php $month = date("mY", strtotime($date->class_date)) @endphp
				@php $inc++ @endphp

			@endforeach

		</div>
	</div>


@endsection
