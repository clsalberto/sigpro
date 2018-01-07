@extends('layouts.page')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@stop

@section('title', 'Lançamento de notas')
@section('content_title')
    <h1>
        Lançamento de notas
        <small>Informe sua metodologia para o lançamento de notas</small>
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
        </div>
        <!-- /.box-header -->

        <form method="POST" action="{{ route('formula.update', $room->id) }}">
            {!! csrf_field() !!}

            <input type="hidden" name="room_id" value="{{ $room->id }}">

            <!-- /.box-body -->
            <div class="box-body">

                <div class="form-group {{ $errors->has('formula_id') ? 'has-error' : '' }}">
                    <label for="formula_id">{{ trans('template.fields.formula') }}</label>
                    <select class="form-control select2" name="formula_id" style="width: 100%;">
                        @foreach($formulas as $formula)
                            <option value="{{ $formula->id }}" {{ old('formula_id') ? 'selected="selected"' : '' }}>{{ $formula->type }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('formula_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('formula_id') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
            <div class="box-footer">
                <a href="{{ route('rooms') }}" class="btn btn-default">{{ trans('template.buttons.cancel') }}</a>
                <button type="submit" class="btn btn-success pull-right">{{ trans('template.buttons.register') }}</button>
            </div>
            <!-- /.box-footer -->

        </form>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('plugins/select2/dist/js/select2.full.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@stop