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

<ul data-widget="tree">
  <li class="treeview active">
    <a href="">Aquiraz</a>
    <ul class="treeview-menu">
      <li class="treeview">
	    <a href="">Técnico em Agronegócio</a>
	    <ul class="treeview-menu">
	      <li><a href="#">Introdução ao Curso e Ética Profissional</a></li>
	      <li><a href="#">Fundamentos do Agronegócio</a></li>
	      <li><a href="#">Manejo da Água e do Solo</a></li>
	    </ul>
	  </li>
    </ul>
  </li>
</ul>

@endsection

@section('scripts')
    <script>
        $(function () {
            $('ul').tree();
        });
    </script>
@stop
