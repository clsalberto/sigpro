@extends('layouts.page') @section('title', 'Notas') @section('content_title')
<h1>
	Notas
	<small>Relação de alunos</small>
</h1>
@stop @section('sidebar') @include('partials.sidebars.sidebar-home') @stop @section('content')






<div class="box box-success">

	<form method="POST" action="{{ route('scores.students.update', $room->id) }}">
		{!! csrf_field() !!}

		<!-- /.box-header -->
		<div class="box-header">
			<h3 class="box-title">{{ $room->course->name }}
				<br>
				<small>{{ $room->module->description }}</small>
			</h3>
			<div class="pull-right">
				<a href="{{ route('formula', $room->id) }}" class="btn btn-default btn-xs">
					<i class="fa fa-edit text-green"></i> Alterar fórmula</a>

				<button type="button" class="btn btn-default btn-xs" data-toggle="dropdown">
					Legendas
					<span class="fa fa-caret-down text-green"></span>
				</button>
				<ul class="dropdown-menu list-group col-md-8 col-xs-12" style="border: 0">
					<li class="list-group-item"><b>AP1 – Avaliação Parcial 1:</b> Atividade realizada em grupo (equipe de 3 a 5 membros) com pontuação de 0.0 a 10.0.
						Ex.: Seminários, oficinas, trabalho de pesquisa, apresentações artísticas pertinente com a disciplina desenvolvida em sala de aula, CVD e outras.</li>
					@if ($registrations->first()->score->has_form)
					<li class="list-group-item"><b>AP2 – Avaliação Parcial 2:</b> Atividade de pesquisa individual com pontuação de 0.0 a 10.0.
						Ex.: Elaboração de mapas conceituais sobre determinado assunto/tema, provas, entre outras.</li>
					@endif
					<li class="list-group-item"><b>AF – Avaliação Final:</b> Atividade individual com pontuação de 0.0 a 10.0.
						Ex.: Prova escrita com questões dissertativas e objetivas, avaliação prática (no caso das disciplinas técnicas), etc.</li>
					<li class="list-group-item"><b>RF – Recuperação Final</b></li>
				</ul>

			</div>
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
						<th class="col-md-1 col-xs-2 text-center">
							@can('post-score-punctuation-a', $registrations) AP1 @endcan
						</th>
						@if ($registrations->first()->score->has_form)
							<th class="col-md-1 col-xs-2 text-center">
								@can('post-score-punctuation-b', $registrations) AP2 @endcan
							</th>
						@endif
						<th class="col-md-1 col-xs-2 text-center">
							@can('post-score-punctuation-c', $registrations) AF @endcan
						</th>
						<th class="col-md-1 col-xs-2 text-center">
							@can('post-score-punctuation-d', $registrations) RF @endcan
						</th>
						<th class="col-md-1 col-xs-1 text-center">MD</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($registrations as $registration)
					<tr>
						<td class="col-md-1 hidden-xs">{{ $registration->student->id }}</td>
						<td class="col-md-4 col-xs-2">{{ $registration->student->full_name }}</td>
						<td class="col-lg-2 hidden-md hidden-xs">{{ $registration->student->cpf }}</td>
						<td class="col-md-1 col-xs-2 text-center">
							<input type="hidden" name="registration_id[]" value="{{ $registration->id }}">
							@can('post-score-punctuation-a', $registration)
								<input type="text" class="form-control score" name="punctuation_a[]" value="{{ ctof($registration->score->punctuation_a) }}">
							@endcan
						</td>
						@if ($registration->score->has_form)
							<td class="col-md-1 col-xs-2 text-center">
								@can('post-score-punctuation-b', $registration)
									<input type="text" class="form-control score" name="punctuation_b[]" value="{{ ctof($registration->score->punctuation_b) }}">
								@endcan
							</td>
						@endif
						<td class="col-md-1 col-xs-2 text-center">
							@can('post-score-punctuation-c', $registration)
								<input type="text" class="form-control score" name="punctuation_c[]" value="{{ ctof($registration->score->punctuation_c) }}">
							@endcan
						</td>
						<td class="col-md-1 col-xs-2 text-center">
							@can('post-score-punctuation-d', $registration)
								@if (ctoi($registration->score->average) < ctoi(config( 'template.institution.media')))
									<input type="text" class="form-control score" name="punctuation_d[]" value="{{ ctof($registration->score->punctuation_d) }}">
								@else
									<input type="text" class="form-control score" name="punctuation_d[]" value="{{ ctof($registration->score->punctuation_d) }}" readonly>
								@endif
							@endcan
						</td>
						<td class="col-md-1 col-xs-1 text-center">
							<strong>{{ $registration->score->average }}</strong>
							@if ($room->check_score)
								{!! ctoi($registration->score->average) < ctoi(config( 'template.institution.media')) ? " <b class='label label-danger'>REP</b>" : " <b class='label label-success'>APR</b>" !!}
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
			@if ($room->has_closure)
				@if ($room->check_score)
				<a href="{{ route('scores.students.print', $room->id) }}" target="_blank" class="btn btn-default btn-xs">
					<i class="fa fa-bar-chart text-green"></i> Comprovante</a>
				@else
				<a href="{{ route('check.score', $room->id) }}" target="_blank" class="btn btn-default btn-xs">
					<i class="fa fa-bar-chart text-green"></i> Encerar lançamento</a>
				@endif
			@endif
			<button type="submit" class="btn btn-success pull-right">{{ trans('template.buttons.register') }}</button>
		</div>
		<!-- /.box-footer -->

	</form>

</div>

@endsection

@section('scripts')
<script src="{{ asset('plugins/jquery-mask/jquery.mask.min.js') }}"></script>
<script>
    $(function() {
        var mask = function (value) {
                return value.length > 2 ? '00.0' : '0.0';
            },
            options = {
                reverse: true,
                onKeyPress: function(value, e, field, options) {
                    field.mask(mask.apply({}, arguments), options);
                    if (field.cleanVal() > 100) {
                        $.Notification.autoHideNotify('error', 'top right', '','Valor inválido '+ value);
                        field.val('');
                    }
                }
            };

        $('.score').mask(mask, options);
    });
</script>
@stop
