@extends('layouts.page')

@section('title', 'Conteúdos')
@section('content_title')
    <h1>
        Conteúdos
        <small>Conteúdo programático de aula</small>
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
            <p class="box-c{{ $class_date->programContent->content }}omment text-justify">
                {!! $class_date->programContent->content !!}
            </p>
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer -->
        <div class="box-footer">
            <a href="{{ route('content', [$room->id, $class_date->id]) }}" class="btn btn-default">{{ trans('template.buttons.edit') }}</a>
        </div>
        <!-- /.box-footer -->

    </div>

@endsection
