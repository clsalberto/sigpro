@extends('layouts.app')

@section('title', 'Comprovante de Frequência')

@section('print')
 	onload="window.print();"
@stop

@section('body')


		<section class="invoice">
	      <!-- title row -->
	      <div class="row">
	        <div class="col-xs-12">
	          <h2 class="page-header">
	            {!! config('template.logo') !!} - Comprovante de Frequência
	            <small class="pull-right"><b>{{ $room->city->name }}</b> - <b>{!! format_date($class_date->class_date) !!}</b></small>
	          </h2>
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- info row -->
	      <div class="row invoice-info">


	        <div class="col-sm-4 invoice-col">
	          <b>{{ config('template.institution.name') }}</b><br>
	          <br>
	          <b>Endereço:</b> {{ config('template.institution.address') }}<br>
	          <b>CNPJ:</b> {{ config('template.institution.cnpj') }}
	        </div>

	        <div class="col-sm-4 invoice-col">
	          Professor
	          <address>
	            <strong>{{ Auth::user()->full_name }}</strong><br>
	            Email: {{ Auth::user()->email }}
	          </address>
	        </div>


	        <div class="col-sm-4 invoice-col">
	          <b>Comprovante #{{ $room->id }}</b><br>
	          <br>
	          <b>Bolsa:</b> {{ $room->course->modality->name }}<br>
	          <b>Curso:</b> {{ $room->course->name }}<br>
	          <b>Módulo:</b> {{ $room->module->description }}
	        </div>

	      </div>
	      <!-- /.row -->

	      <!-- Table row -->
	      <div class="row">
	        <div class="col-xs-12 table-responsive">
	          <table class="table table-striped">
	            <thead>
	                <tr>
						<th class="col-md-1">ID</th>
						<th class="col-md-4">Nome</th>
						<th class="col-md-2">CPF</th>
						<th class="col-md-1"></th>
						<th class="col-md-4" colspan="4">Frequência</th>
	                </tr>
	            </thead>
	            <tbody>
				@foreach ($registrations as $registration)
	                <tr>
	                    <td>{{ $registration->student->id }}</td>
	                    <td>{{ $registration->student->full_name }}</td>
	                    <td>{{ $registration->student->cpf }}</td>
						<td>
							<span class="sparkpie">{{ $registration->workload }},{{ $class_date->workload - $registration->workload }}</span>
						</td>
	                    <td class="col-md-1">
							<b>A</b> {!! $registration->frequency($class_date->id, $registration->id)->presence_a ? "<b class='label label-success'>P</b>" : "<b class='label label-danger'>F</b>" !!}
						</td>
                        <td class="col-md-1">
							<b>B</b> {!! $registration->frequency($class_date->id, $registration->id)->presence_b ? "<b class='label label-success'>P</b>" : "<b class='label label-danger'>F</b>" !!}
						</td>
                        <td class="col-md-1">
							<b>C</b> {!! $registration->frequency($class_date->id, $registration->id)->presence_c ? "<b class='label label-success'>P</b>" : "<b class='label label-danger'>F</b>" !!}
						</td>
                        <td class="col-md-1">
							@if ($room->shift == 'D')
								<b>D</b> {!! $registration->frequency($class_date->id, $registration->id)->presence_d ? "<b class='label label-success'>P</b>" : "<b class='label label-danger'>F</b>" !!}
							@endif
						</td>
	                </tr>
	            @endforeach
	            </tbody>
							<tfoot>
                    <tr>
                        <th colspan="4">{{ 'Total de alunos: ' . count($registrations) }}</th>
                    </tr>
                </tfoot>
	          </table>
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <b>Conteúdo de aula</b>
                </div>
                <div class="col-md-12">
                    {!! $class_date->programContent->content !!}
                </div>
            </div>

	      <div class="row">
	        <!-- accepted payments column -->
	        <div class="col-xs-6">

	        </div>
	        <!-- /.col -->
	        <div class="col-xs-6">
	          <p class="lead">Assinatura do Professor</p>



	            <div class="row">
	            	<hr class="col-md-4" style="border: 0.1pt solid #000;">
	            </div>


	        </div>
	        <!-- /.col -->
	      </div>


	    </section>

@endsection

@section('scripts')
	@can('view-frequencies', $registrations)
		<script src="{{ asset('plugins/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
		<script>
            $(document).ready(function(){
                $('.sparkpie').sparkline('html', {type: 'pie', height: '1.3em', sliceColors: ['#00a65a','#dd4b39','#f39c12','#3c8dbc','#66aa00','#dd4477','#0099c6','#605ca8']});
            });
		</script>
	@endcan
@stop