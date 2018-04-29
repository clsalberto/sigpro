<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#3c8dbc">

    <meta name="msapplication-TileColor" content="#3c8dbc">
    <meta name="theme-color" content="#ffffff">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.css') }}">
    <!-- Notify -->
    <link rel="stylesheet" href="{{ asset('plugins/notify/css/notification.css') }}">

    @yield('stylesheets')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body @yield('print') class="hold-transition @yield('body_class')">


    @yield('body')

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/notify/js/notify.min.js') }}"></script>
    <script src="{{ asset('plugins/notify/js/notify-metro.js') }}"></script>
    <script src="{{ asset('plugins/notify/js/notifications.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')

    @if(config('template.skin.message.type') == 'toastr')
        @include('partials.message.toastr')
    @endif

</body>
</html>
