@extends('layouts.page')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@stop

@section('title', 'Conteúdos')
@section('content_title')
    <h1>
        Justificativa de Falta
        <small>Cadastro de justificativa de falta</small>
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

        <form method="POST" action="{{ route('justify.register', $frequency->id) }}" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <input type="hidden" name="frequency_id" value="{{ $frequency->id }}">

        <!-- /.box-body -->
        <div class="box-body">

            <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                <label for="comments">{{ trans('template.fields.comments') }}</label>
                <textarea name="comments" class="form-control textarea" cols="30" rows="10" placeholder="{{ trans('template.fields.comments') }}">{{ old('comments') }}</textarea>
                @if ($errors->has('comments'))
                    <span class="help-block">
                        <strong>{{ $errors->first('comments') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('document') ? 'has-error' : '' }}">
                <label for="document">{{ trans('template.fields.document') }}</label>
                <input type="file" name="document" accept="image/*">
                @if ($errors->has('document'))
                    <span class="help-block">
                        <strong>{{ $errors->first('document') }}</strong>
                    </span>
                @endif
            </div>

        </div>
        <!-- /.box-body -->

        <!-- /.box-footer -->
        <div class="box-footer">
            <a href="" class="btn btn-default">{{ trans('template.buttons.cancel') }}</a>
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
