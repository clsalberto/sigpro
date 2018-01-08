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
						<th class="col-md-1 hidden-xs">ID</th>
						<th class="col-md-4 col-xs-3">Nome</th>
						<th class="col-lg-2 hidden-md hidden-xs">CPF</th>
						<th class="col-md-1 col-xs-2">AP1</th>
						@if ($registrations->first()->score($class_date->id, $registrations->first()->id)->has_form)
							<th class="col-md-1 col-xs-2">AP2</th>
						@endif
						<th class="col-md-1 col-xs-2">AF</th>
						<th class="col-md-1 col-xs-1">MD</th>
						<th class="col-md-1 col-xs-2">RC</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($registrations as $registration)
					<tr>
						<td class="col-md-1 hidden-xs">{{ $registration->student->id }}</td>
						<td class="col-md-4 col-xs-2">{{ $registration->student->full_name }}</td>
						<td class="col-lg-2 hidden-md hidden-xs">{{ $registration->student->cpf }}</td>
						<td class="col-md-1 col-xs-2">
							<input type="hidden" name="registration_id[]" value="{{ $registration->id }}">
							<input type="text" class="form-control" name="punctuation_a[]" value="{{ ctof($registration->score($class_date->id, $registration->id)->punctuation_a) }}" data-inputmask="'mask': ['9[9].9']" data-mask>
						</td>
						@if ($registration->score($class_date->id, $registration->id)->has_form)
							<td class="col-md-1 col-xs-2"><input type="text" class="form-control" name="punctuation_b[]" value="{{ ctof($registration->score($class_date->id, $registration->id)->punctuation_b) }}" data-inputmask="'mask': ['9[9].9']" data-mask></td>
						@endif
						<td class="col-md-1 col-xs-2"><input type="text" class="form-control" name="punctuation_c[]" value="{{ ctof($registration->score($class_date->id, $registration->id)->punctuation_c) }}" data-inputmask="'mask': ['9[9].9']" data-mask></td>
						<td class="col-md-1 col-xs-1">
							<strong>{{ $registration->score($class_date->id, $registration->id)->average }}</strong>
							@if ($class_date->check_score)
								{!! ctoi($registration->score($class_date->id, $registration->id)->average) < ctoi(config('template.institution.media')) ? " <b class='label label-danger'>R</b>" : " <b class='label label-success'>A</b>" !!}
							@endif
						</td>
						<td class="col-md-1 col-xs-2">
							@if (ctoi($registration->score($class_date->id, $registration->id)->average) < ctoi(config('template.institution.media')) || ctoi($registration->score($class_date->id, $registration->id)->punctuation_d) > 0)
								<input type="text" class="form-control" name="punctuation_d[]" value="{{ ctof($registration->score($class_date->id, $registration->id)->punctuation_d) }}" data-inputmask="'mask': ['9[9].9']" data-mask>
							@else
								<input type="text" class="form-control" name="punctuation_d[]" value="{{ ctof($registration->score($class_date->id, $registration->id)->punctuation_d) }}" data-inputmask="'mask': ['9[9].9']" data-mask disabled>
							@endif
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
			@if ($class_date->check_score)
				<a href="{{ route('scores.students.print', [$room->id, $class_date->id]) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-bar-chart"></i> Comprovante</a>
			@else
				<a href="{{ route('check.score', [$room->id, $class_date->id]) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-bar-chart"></i> Encerar lançamento</a>
			@endif
			<button type="submit" class="btn btn-success pull-right">{{ trans('template.buttons.register') }}</button>
		</div>
		<!-- /.box-footer -->

		</form>

	</div>

@endsection

@section('scripts')
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
	<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script>
        $(function () {
            $('[data-mask]').inputmask();
        });
    </script>
@stop