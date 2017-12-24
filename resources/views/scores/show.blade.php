@extends('layouts.page')

@section('title', 'Notas')
@section('content_title')
    <h1>
        Notas
        <small>Relação de alunos</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')

	<div class="box box-success">

		<form method="POST" action="{{ route('scores.students.update', [$room->id, $class_date->id]) }}">
		{!! csrf_field() !!}

		<!-- /.box-header -->
		<div class="box-header">
			<h3 class="box-title">{{ $room->course->name }} <br><small>{{ $room->module->description }}</small></h3>
			<div class="box-comment pull-right">{!! format_date($class_date->class_date) !!}</div>
		</div>
		<!-- /.box-header -->

		<!-- /.box-body -->
		<div class="box-body">
			<table class="table table-hover">
				<thead>
				<tr>
					<th class="col-md-1">ID</th>
					<th class="col-md-8">Nome</th>
					<th class="col-md-2">CPF</th>
					<th class="col-md-1">Notas</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($registrations as $registration)
					<tr>
						<td>{{ $registration->student->id }}</td>
						<td>{{ $registration->student->full_name }}</td>
						<td>{{ $registration->student->cpf }}</td>
						<td>
							<input type="hidden" name="registration_id[]" value="{{ $registration->id }}">
							<input class="form-control" name="punctuation[]" value="{{ $registration->score($class_date->id, $registration->id)->punctuation }}">
						</td>
					</tr>
				@endforeach
				</tbody>
				<tfoot>
                    <tr>
                        <th colspan="3">{{ 'Registros: ' . count($registrations) }}</th>
                    </tr>
                </tfoot>
			</table>
		</div>
		<!-- /.box-body -->

		<!-- /.box-footer -->
		<div class="box-footer">
			<a href="{{ route('scores.students.print', [$room->id, $class_date->id]) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-bar-chart"></i> Comprovante</a>
			<button type="submit" class="btn btn-success pull-right">{{ trans('template.buttons.register') }}</button>
		</div>
		<!-- /.box-footer -->

		</form>

	</div>

@endsection

