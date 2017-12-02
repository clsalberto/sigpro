@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-' . config('template.skin.color', 'blue') . '.css') }}">
    @yield('styles')
@stop

@section('body_class', 'skin-' . config('template.skin.color', 'blue') . ' sidebar-mini')

@section('body')

    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">{!! config('template.logo_mini') !!}</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">{!! config('template.logo') !!}</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">

                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> {{ trans('template.buttons.log_out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('images/avatars/' . Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{  Auth::user()->name }}</p>
                        <!-- Status -->
                        <a href="{{ route('profile') }}">{{ Auth::user()->email }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                    <li class="{{ set_active('home') }}"><a href="{{ route('home') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>

                    @yield('sidebar')

                    <li class="header">PERFIL</li>
                    <li class="{{ set_active('profile.edit') }}"><a href="{{ route('profile.edit') }}"><i class="fa fa-edit"></i> <span>{{ trans('template.links.edit_profile') }}</span></a></li>
                    <li class="{{ set_active('password.edit') }}"><a href="{{ route('password.edit') }}"><i class="fa fa-lock"></i> <span>{{ trans('template.links.edit_password') }}</span></a></li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_title')
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                @include('partials.messages.message')
                @yield('content')

            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                {{ config('template.version') }}
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; {{ date("Y") }} <a href="{{ route('home') }}">{{ config('app.name') }}</a>.</strong> Todos os direitos reservados.
        </footer>
        <!-- /.main-footer -->

    </div>
    <!-- ./wrapper -->



@stop