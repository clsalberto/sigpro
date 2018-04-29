@extends('layouts.page')

@section('title', 'Conteúdos')
@section('content_title')
    <h1>
        Justificativa de Falta
        <small>Informe de justificativa de falta</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')

    <div class="box box-success">

        <!-- /.box-header -->
        <div class="box-header">
            <h3 class="box-title">{{ $registration->student->name }} <br>
                <small>{{ $registration->student->surname }}</small>
            </h3>
            <div class="box-comment pull-right">{!! format_date($class_date->class_date) !!}</div>
        </div>
        <!-- /.box-header -->

        <!-- /.box-body -->
        <div class="box-body">
            <div class="box-comment text-justify">
                {!! $frequency->justification->comments !!}
            </div>
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer -->
        <div class="box-footer">
            <a href="{{ route('frequencies.students', [$class_date->room_id, $class_date->id]) }}" class="btn btn-default btn-xs">Voltar</a>
            <button type="button" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#modal-document">
                <i class="fa fa-archive text-green"></i> Visualizar documento
            </button>
        </div>
        <!-- /.box-footer -->

    </div>

    <div class="modal fade" id="modal-document">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Documento</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <img src="{{ asset('images/documents/' . $frequency->justification->document) }}" class="img-responsive" alt="documento">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs pull-right" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
