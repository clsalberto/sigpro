@extends('layouts.page')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@stop

@section('title', 'Editar')
@section('content_title')
    <h1>
        Editar
        <small>Alterar dados e permições do usuário</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')
    <div class="box box-success">

        <!-- /.box-header -->
        <div class="box-header">
            <h3 class="box-title">Usuários</h3>
        </div>
        <!-- /.box-header -->

        <form method="POST" action="{{ route('user.update', $user_edit->id) }}">
        {!! csrf_field() !!}

        <!-- /.box-body -->
        <div class="box-body">

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('template.fields.name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ $user_edit->name }}" placeholder="{{ trans('template.fields.name') }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                <label for="type">{{ trans('template.fields.type') }}</label>
                <select class="form-control select2" name="type" data-placeholder="{{ trans('template.fields.type') }}" style="width: 100%;">
                    <option></option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ ($user_edit->role->id == $type->id) ? 'selected="selected"' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>

        </div>
        <!-- /.box-body -->

        <!-- /.box-footer -->
        <div class="box-footer">
            <a href="{{ route('users') }}" class="btn btn-default">{{ trans('template.buttons.cancel') }}</a>
            <button type="submit" class="btn btn-success pull-right">{{ trans('template.buttons.register') }}</button>
        </div>
        <!-- /.box-footer -->

        </form>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/select2/dist/js/select2.full.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/i18n/pt-BR.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@stop
