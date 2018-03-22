@extends('layouts.page')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@stop

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

        <form method="POST" action="{{ route('content.register', [$room->id, $class_date->id]) }}">
        {!! csrf_field() !!}

            <input type="hidden" name="room_id" value="{{ $room->id }}">
            <input type="hidden" name="class_date_id" value="{{ $class_date->id }}">

        <!-- /.box-body -->
        <div class="box-body">

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">{{ trans('template.fields.content') }}</label>
                <textarea name="content" class="form-control textarea" cols="30" rows="10" placeholder="{{ trans('template.fields.content') }}">{{ $class_date->has_content ? $class_date->programContent->content : old('content') }}</textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>

        </div>
        <!-- /.box-body -->

        <!-- /.box-footer -->
        <div class="box-footer">
            <a href="{{ route('frequencies', $room->id) }}" class="btn btn-default">{{ trans('template.buttons.cancel') }}</a>
            <button type="submit" class="btn btn-success pull-right">{{ trans('template.buttons.register') }}</button>
        </div>
        <!-- /.box-footer -->

        </form>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.pt-BR.js') }}"></script>
    <script>
        $(function () {
            $(".textarea").wysihtml5({
                toolbar: {
                    "font-styles": false,
                    "emphasis": true,
                    "lists": true,
                    "html": false,
                    "link": false,
                    "image": false,
                    "color": false,
                    "blockquote": true,
                    "size": "sm",
                    "fa": true
                },
                locale: "pt-BR"
            });
        });
    </script>
@stop
