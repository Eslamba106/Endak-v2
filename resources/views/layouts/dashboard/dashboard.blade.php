<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') </title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/SansPro.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/mycustomstyle.css') }}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css').'?version='.time()}}"> --}}

    <link rel="stylesheet" href="{{ asset('select2-4.0.3/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/line-awesome.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @if (session()->has('locale') && session()->get('locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}">
    @endif

    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.dashboard.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.dashboard.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('layouts.dashboard.content')

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        {{-- @include('layouts.dashboard.footer') --}}

    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- jQuery -->

    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/dist/adminlte.min.js') }}"></script>
    {{-- <script src="{{ asset('toastr/toastr.min.js').'?version='.time()}}"></script> --}}
    <script src="{{ asset('select2-4.0.3/js/select2.min.js') }}"></script>
    <script>
        $(document).on('change', '.bulk_check_all', function() {
            $('input.check_bulk_item:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
    @yield('js')
</body>

</html>
