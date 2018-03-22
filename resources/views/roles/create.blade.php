@extends('layouts.page')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
@stop

@section('title', 'Novo')
@section('content_title')
    <h1>
        Novo
        <small>Novo tipo</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')
    <div class="box box-success">

        <!-- /.box-header -->
        <div class="box-header">
            <h3 class="box-title">Tipo</h3>
        </div>
        <!-- /.box-header -->

        <form method="POST" action="{{ route('role.store') }}">
        {!! csrf_field() !!}

        <!-- /.box-body -->
        <div class="box-body">

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('template.fields.type') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="{{ trans('template.fields.type') }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>



            <div class="form-group">
                <label for="type">{{ trans('template.fields.permissions') }}</label>
                <ul class="todo-list">
                    @foreach($permissions as $permission)
                    <li>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                        <span class="text">{{ $permission->name }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <!-- /.box-body -->

        <!-- /.box-footer -->
        <div class="box-footer">
            <a href="{{ route('roles') }}" class="btn btn-default">{{ trans('template.buttons.cancel') }}</a>
            <button type="submit" class="btn btn-success pull-right">{{ trans('template.buttons.register') }}</button>
        </div>
        <!-- /.box-footer -->

        </form>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/iCheck/icheck.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            });
        });
    </script>
@stop
