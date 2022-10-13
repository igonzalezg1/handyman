<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>App Handyman</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Icono de la apicacion -->
    <link rel="shortcut icon" href="{{ asset('img/iconoapp.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- Bulma -->
    <link rel="stylesheet" href="{{ asset('css/bulma.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    @yield('page_css')
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/buttons.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/misestilosivan.css') }}">
    <!-- Selector de fechas -->
    <script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/miscss.css') }}">
    @yield('page_css')
    @yield('css')
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg enca"></div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
            @include('adminlte.header')
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('adminlte.sidebar')
        </aside>
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</div>
</body>
<!-- Bootstrap -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/fullcalendar/main.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
<!-- Template JS File -->
@yield('page_js')
@yield('scripts')
<!-- Data tables -->
<script type="text/javascript" src="{{ asset('js/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/buttons.print.min.js') }}"></script>
<!-- Mis Scripts -->
<script src="{{ asset('js/misjs.js') }}"></script>
</html>
