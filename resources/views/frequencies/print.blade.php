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
	                    <td>{!! $registration->frequency($class_date->id, $registration->id)->presence ? "<b class='label label-success'>P</b>" : "<b class='label label-danger'>F</b>" !!}</td>
	                </tr>
	            @endforeach
	            </tbody>
	          </table>
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->

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
	      <!-- /.row -->

	    </section>


@endsection
