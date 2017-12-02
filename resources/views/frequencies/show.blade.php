@extends('layouts.page')

@section('styles')
	<link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
@stop

@section('title', 'Frequência')
@section('content_title')
	<h1>
		Frequência
		<small>Relação de alunos</small>
	</h1>
@stop

@section('sidebar')
	@include('partials.sidebars.sidebar-home')
@stop

@section('content')

	<div class="box box-success">

		<!-- /.box-header -->
		<div class="box-header">
			<p>{{ $room->city->name }}</p>
			<h3 class="box-title">{{ $room->course->name }} <br><small>{{ $room->module->description }}</small></h3>
			<h3 class="box-title pull-right">{{ format_date($class_date->class_date) }}</h3>
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
					<th class="col-md-1">Frequência</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($registrations as $registration)
					<tr>
						<td>{{ $registration->student->id }}</td>
						<td>{{ $registration->student->full_name }}</td>
						<td>{{ $registration->student->cpf }}</td>
						<td>
							<input type="checkbox" value="{{ $registration->id }}" {{ $registration->frequency($class_date->id, $registration->id)->presence ? 'checked' : '' }}>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->

		<!-- /.box-footer -->
		<div class="box-footer">
			<a href="{{ route('frequencies.students.print', [$room->id, $class_date->id]) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-check-square-o"></i> Comprovante</a>
		</div>
		<!-- /.box-footer -->

	</div>

@endsection

@section('scripts')
	<script src="{{ asset('plugins/iCheck/icheck.js') }}"></script>
	<script>
        $(document).ready(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            });

            $('input').on('ifChecked', function(){
                var id = $(this).val();
                var url = '/frequency/{{ $class_date->id }}/' + id + '/active';
                $.ajax({
                    method: 'POST',
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(){
                        console.log('Frequency TRUE');
                    }
                });
            });

            $('input').on('ifUnchecked', function(){
                var id = $(this).val();
                var url = '/frequency/{{ $class_date->id }}/' + id + '/inactive';
                $.ajax({
                    method: 'POST',
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(){
                        console.log('Frequency FALSE');
                    }
                });
            });
        });
	</script>
@stop