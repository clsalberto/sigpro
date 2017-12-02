@extends('layouts.page')

@section('title', 'Home')
@section('content_title')
    <h1>
        Home
        <small>Início</small>
    </h1>
@stop

@section('sidebar')
    @include('partials.sidebars.sidebar-home')
@stop

@section('content')

@endsection
