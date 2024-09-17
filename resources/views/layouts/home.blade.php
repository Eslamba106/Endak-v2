<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-hover" data-theme-mode="light">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="whmcs website templates, whmcs html template, hosting template html, bootstrap whmcs, bootstrap web hosting template, web hosting template with whmcs, html hosting template,website hosting and templates, html web hosting, hosting website template, web hosting in html, template hosting bootstrap, whmcs hosting template, whmcs web hosting template">

    <!-- TITLE -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    {{-- <link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon"> --}}
    <link rel="stylesheet" href="{{ asset('home/assets/css/line-awesome.min.css')  }}">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('home/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('home/assets/css/styles.css') }}" rel="stylesheet">

    <!-- Simonwep-picker CSS -->
    <link href="{{ asset('home/assets/libs/@simonwep/pickr/themes/classic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/libs/@simonwep/pickr/themes/monolith.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/libs/@simonwep/pickr/themes/nano.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('home/assets/css/icons.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body class="main-body light-theme">


    <!-- Back-to-top -->


    <!-- <a href="javascript:void(0);" class="buy-now" data-target="html">
        <span class="fe fe-message-square"></span>
    </a> -->


    <div class="page">


        @include('layouts.front_office.header')

        <div class="main-content app-content">

            @yield('header')
            {{-- <section>
                <div class="section banner-4 banner-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 text-center">
                                <div class="">
                                    <p class="mb-3 content-1 h5 text-white">Blog <span class="tx-info-dark">Page</span></p>
                                    <p class="mb-0 tx-28">We Fight Passionately to Get Our Clients Every Time They Deserve</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section> --}}
            @yield('content')

        </div>

        @include('layouts.front_office.footer')



        <!-- Bootstrap js -->
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Popper JS -->
        <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

        <!-- Defaultmenu JS -->
        <script src="{{ asset('assets/js/defaultmenu.js') }}"></script>

        <!-- Categorymenu JS -->
        <script src="{{ asset('assets/js/category-menu.js') }}"></script>

        <!-- Accept-cookie JS -->
        <script src="{{ asset('assets/js/cookies.js') }}"></script>

        <!-- Custom-switcher JS -->
        <script src="{{ asset('assets/js/custom-switcher.js') }}"></script>

        <!-- Sticky JS -->
        <script src="{{ asset('assets/js/sticky.js') }}"></script>

        <!-- CUSTOM JS -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        @yield('script')
</body>

</html>
