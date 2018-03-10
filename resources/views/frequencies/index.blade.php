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
					<li class="{{ $active }}"><a href="#{{ mb_strtolower(format_date_name($date->class_date)) }}" data-toggle="tab">{{ format_date_name($date->class_date) }}</a></li>
				@endif
				@php $month = date("mY", strtotime($date->class_date)) @endphp
			@endforeach

			<li class="pull-left box-header">
				<h3 class="box-title">{{ $room->course->name }}
					<br><small>{{ $room->module->description }}</small>
				</h3>
			</li>
		</ul>
		<div class="tab-content">


			@php $month = '' @endphp
			@php $inc = 1 @endphp
			@foreach ($dates as $date)

				@php $active = (date("mY", strtotime($date->class_date)) == date("mY")) ? ' active' : '' @endphp

				@if($month <> date("mY", strtotime($date->class_date)))
					<div class="tab-pane{{ $active }}" id="{{ mb_strtolower(format_date_name($date->class_date)) }}">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="col-md-1">ID</th>
									<th class="col-md-8">Data</th>
									<th class="col-md-3"></th>
								</tr>
							</thead>
							<tbody>
				@endif

								<tr>
									<td>{{ $date->id }}</td>
									<td>{!! format_date($date->class_date) !!}</td>
									<td>
										@can('view-frequencies', $date)
											<div class="btn-group">
												@if($date->has_content)
												<a href="{{ route('content.show', [$room->id, $date->id]) }}" class="btn btn-default btn-xs">
													<i class="fa fa-cog text-green"></i> Conteúdos </a>
												<a href="{{ route('frequencies.students', [$room->id, $date->id]) }}" class="btn btn-default btn-xs">
													<i class="fa fa-check text-green"></i> Lançar Frequência </a>
												@else
												<a href="{{ route('content', [$room->id, $date->id]) }}" class="btn btn-default btn-xs">
													<i class="fa fa-cog text-green"></i> Conteúdos </a>
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
