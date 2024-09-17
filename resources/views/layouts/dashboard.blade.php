<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css') }}">
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> --}}
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/line-awesome.min.css') . '?version=' . time() }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('dashboard/rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rtl/custom_rtl.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}"> --}}

    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        {{-- Navbar --}}

        @include('layouts.dashboard.header')
        <!-- Main Sidebar Container -->
        {{-- SideBar --}}

        @include('layouts.dashboard.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('layouts.dashboard.footer')
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('dashboard/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('dashboard/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        {{-- <script src="{{ asset('dist/js/adminlte.js') }}"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="{{ asset('dist/js/demo.js') }}"></script> --}}

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('dashboard/js/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('dashboard/js/raphael.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/maps/world_countries.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('dashboard/js/Chart.min.js') }}"></script>

        <!-- PAGE SCRIPTS -->
        {{-- <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script> --}}
        @yield('js')
</body>

</html>
