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
			<h3 class="box-title">{{ $room->course->name }} <br>
                <small>{{ $room->module->description }}</small>
            </h3>
			<div class="box-comment pull-right">{!! format_date($class_date->class_date) !!}</div>
		</div>
		<!-- /.box-header -->

		<!-- /.box-body -->
		<div class="box-body">
			<table class="table table-hover">
				<thead>
				<tr>
					<th class="col-md-1">ID</th>
					<th class="col-md-5">Nome</th>
					<th class="col-md-2">CPF</th>
					<th class="col-md-4" colspan="4">Frequência</th>
				</tr>
				</thead>
                @can('view-frequencies', $registrations)
    				<tbody>
    				@foreach ($registrations as $registration)
    					<tr>
    						<td>{{ $registration->student->id }}</td>
    						<td>{{ $registration->student->full_name }}</td>
    						<td>{{ $registration->student->cpf }}</td>
    						<td class="col-md-1">
                                @can('post-frequencies', $registrations)
                                    <label>A <input name="presence_a" type="checkbox" value="{{ $registration->id }}" {{ $registration->frequency($class_date->id, $registration->id)->presence_a ? 'checked' : '' }}></label>
                                @endcan
                            </td>
    						<td class="col-md-1">
                                @can('post-frequencies', $registrations)
                                    <label>B <input name="presence_b" type="checkbox" value="{{ $registration->id }}" {{ $registration->frequency($class_date->id, $registration->id)->presence_b ? 'checked' : '' }}></label>
                                @endcan
                            </td>
    						<td class="col-md-1">
                                @can('post-frequencies', $registrations)
                                    <label>C <input name="presence_c" type="checkbox" value="{{ $registration->id }}" {{ $registration->frequency($class_date->id, $registration->id)->presence_c ? 'checked' : '' }}></label>
                                @endcan
                            </td>
    						<td class="col-md-1">
                                @can('post-frequencies', $registrations)
                                    @if ($room->shift == 'D')
        							    <label>D <input name="presence_d" type="checkbox" value="{{ $registration->id }}" {{ $registration->frequency($class_date->id, $registration->id)->presence_d ? 'checked' : '' }}></label>
                                    @endif
                                @endcan
                            </td>
    					</tr>
    				@endforeach
    				</tbody>
    				<tfoot>
                        <tr>
                            <th colspan="4">{{ 'Registros: ' . count($registrations) }}</th>
                        </tr>
                    </tfoot>
                @endcan
			</table>
		</div>
		<!-- /.box-body -->

		<!-- /.box-footer -->
		<div class="box-footer">
            @can('view-frequencies', $registrations)
                @if ($class_date->check_frequency)
                    <a href="{{ route('frequencies.students.print', [$room->id, $class_date->id]) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-bar-chart text-green"></i> Comprovante</a>
                @else
                    <a href="{{ route('check.frequency', [$room->id, $class_date->id]) }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-bar-chart text-green"></i> Encerar lançamento</a>
                @endif
            @endcan
		</div>
		<!-- /.box-footer -->

	</div>

@endsection

@section('scripts')
    @can('view-frequencies', $registrations)
    	<script src="{{ asset('plugins/iCheck/icheck.js') }}"></script>
    	<script>
            $(document).ready(function(){
                $('input').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue'
                });

                $('input[name=presence_a]').on('ifChecked', function(){
                    var id = $(this).val();
                    var url = '/frequency/{{ $class_date->id }}/' + id + '/active_a';
                    $.ajax({
                        method: 'POST',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(){
                            console.log('Frequency TRUE');
                        }
                    });
                });

                $('input[name=presence_a]').on('ifUnchecked', function(){
                    var id = $(this).val();
                    var url = '/frequency/{{ $class_date->id }}/' + id + '/inactive_a';
                    $.ajax({
                        method: 'POST',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(){
                            console.log('Frequency FALSE');
                        }
                    });
                });

    			$('input[name=presence_b]').on('ifChecked', function(){
                    var id = $(this).val();
                    var url = '/frequency/{{ $class_date->id }}/' + id + '/active_b';
                    $.ajax({
                        method: 'POST',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(){
                            console.log('Frequency TRUE');
                        }
                    });
                });

                $('input[name=presence_b]').on('ifUnchecked', function(){
                    var id = $(this).val();
                    var url = '/frequency/{{ $class_date->id }}/' + id + '/inactive_b';
                    $.ajax({
                        method: 'POST',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(){
                            console.log('Frequency FALSE');
                        }
                    });
                });

    			$('input[name=presence_c]').on('ifChecked', function(){
                    var id = $(this).val();
                    var url = '/frequency/{{ $class_date->id }}/' + id + '/active_c';
                    $.ajax({
                        method: 'POST',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(){
                            console.log('Frequency TRUE');
                        }
                    });
                });

                $('input[name=presence_c]').on('ifUnchecked', function(){
                    var id = $(this).val();
                    var url = '/frequency/{{ $class_date->id }}/' + id + '/inactive_c';
                    $.ajax({
                        method: 'POST',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(){
                            console.log('Frequency FALSE');
                        }
                    });
                });

    			$('input[name=presence_d]').on('ifChecked', function(){
                    var id = $(this).val();
                    var url = '/frequency/{{ $class_date->id }}/' + id + '/active_d';
                    $.ajax({
                        method: 'POST',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(){
                            console.log('Frequency TRUE');
                        }
                    });
                });

                $('input[name=presence_d]').on('ifUnchecked', function(){
                    var id = $(this).val();
                    var url = '/frequency/{{ $class_date->id }}/' + id + '/inactive_d';
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
    @endcan
@stop
