<div class="head_menu_container">
    <?php $settings = App\Models\Settings::first(); ?>
    <header class="main-header" id="stickyHeader">

        <!-- Start::main-brand-header -->
        <div class="main-brand-header">
            <div class="container brand-header-container">
                <div class="d-flex align-items-center">
                    <!-- Start::header-element -->
                    <div class="header-element me-1">
                        <!-- Start::header-link -->
                        <a href="javascript:void(0);" class="sidemenu-toggle1 header-link" data-bs-toggle="sidebar">
                            <span class="open-toggle">
                                <i class="bi bi-text-indent-left header-link-icon"></i>
                            </span>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->
                    {{-- <a href="#" class="brand-main">
                        <img src="../assets/images/brand/logo-white.png" alt="img" class="desktop-logo logo-dark">
                        <img src="../assets/images/brand/toggle-dark.png" alt="img"
                            class="mobile-logo mobile-dark mx-3">
                        <img src="../assets/images/brand/logo-color.png" alt="img" class="desktop-logo logo-color">
                        <img src="../assets/images/brand/toggle-color.png" alt="img"
                            class="mobile-logo mobile-color">
                    </a> --}}

                    {{-- <ul class="categories-dropdowns">
                        <li class="category-dropdown px-2 py-3">
                            <a href="javascript:void(0);" class="avatar bg-white-1 border rounded-circle tx-15 border-white-2 categorydropdown" onclick="toggleDropdown(this)">
                                <i class="bi bi-grid text-white"></i>
                            </a>
                            <ul class="main-dropdown" id="dropdown-toggle">
                                <li>
                                    <div class="categories-dropdowns__item">
                                        <span class="me-1"><i class="bi bi-cast tx-17"></i></span>
                                        Web Hosting
                                        <span class="float-end"><i class="bi bi-chevron-right tx-11"></i></span>
                                    </div>
                                    <ul class="category-menu"> 
                                        <li><a href="linux-shared-hosting.html" class="category-item">Linux Shared Hosting</a></li>
                                        <li><a href="windows-shared-hosting.html" class="category-item">Windows Shared Hosting</a></li>
                                        <li><a href="wordpress-shared-hosting.html" class="category-item">Wordpress Shared Hosting</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="categories-dropdowns__item">
                                        <span class="me-1"><i class="bi bi-globe tx-17"></i></span>
                                        Domains
                                        <span class="float-end"><i class="bi bi-chevron-right tx-11"></i></span>
                                    </div>
                                    <ul class="category-menu">
                                        <li><a href="register-domain.html" class="category-item">Register Domain</a></li>
                                        <li><a href="domain-transfer.html" class="category-item">Transfer Domain</a></li>
                                        <li><a href="premium-domains.html" class="category-item">Premium Domains</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="categories-dropdowns__item">
                                        <span class="me-1"><i class="bi bi-layers tx-17"></i></span>
                                        Reseller Hosting
                                        <span class="float-end"><i class="bi bi-chevron-right tx-11"></i></span>
                                    </div>
                                    <ul class="category-menu">
                                        <li><a href="linux-reseller-hosting.html" class="category-item">Linux Reseller Hosting</a></li>
                                        <li><a href="windows-reseller-hosting.html" class="category-item">Windows Reseller Hosting</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="categories-dropdowns__item">
                                        <span class="me-1"><i class="bi bi-clouds tx-17"></i></span>
                                        Cloud Hosting
                                        <span class="float-end"><i class="bi bi-chevron-right tx-11"></i></span>
                                    </div>
                                    <ul class="category-menu">
                                        <li><a href="cloud.html" class="category-item">Cloud Hosting</a></li>
                                        <li><a href="professional-cloud.html" class="category-item">Professional Cloud Hosting</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="categories-dropdowns__item">
                                        <span class="me-1"><i class="bi bi-hdd-network tx-17"></i></span>
                                        Servers
                                        <span class="float-end"><i class="bi bi-chevron-right tx-11"></i></span>
                                    </div>
                                    <ul class="category-menu">
                                        <li><a href="virtualserver-linux-hosting.html" class="category-item">Linux KVM VPS</a></li>
                                        <li><a href="dedicated-server.html" class="category-item">Dedicated Servers</a></li>
                                        <li><a href="windows-dedicated-server.html" class="category-item">Windows Dedicated Servers</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="categories-dropdowns__item">
                                        <span class="me-1"><i class="bi bi-envelope-plus tx-17"></i></span>
                                        Email & Productivity
                                        <span class="float-end"><i class="bi bi-chevron-right tx-11"></i></span>
                                    </div>
                                    <ul class="category-menu">
                                        <li><a href="business-email.html" class="category-item">Business Email</a></li>
                                        <li><a href="enterprise-email.html" class="category-item">Enterprise Email</a></li>
                                        <li><a href="google-workspace.html" class="category-item">Google Workspace</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="categories-dropdowns__item">
                                        <span class="me-1"><i class="bi bi-shield-check tx-17"></i></span>
                                        Security
                                        <span class="float-end"><i class="bi bi-chevron-right tx-11"></i></span>
                                    </div>
                                    <ul class="category-menu">
                                        <li><a href="ssl-certificates.html" class="category-item">SSL Certificate</a></li>
                                        <li><a href="codeguard-backup.html" class="category-item">CodeGuard Website Backup</a></li>
                                        <li><a href="sitelock.html" class="category-item">SiteLock</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul> --}}
                </div>
                <ul class="nav list-unstyled align-items-center">
                    <li class="d-flex align-items-center position-relative me-md-4 me-2">
                        <a href="tel:+1236789657" class="stretched-link"></a>
                        <span class="avatar bg-white-1 border rounded-circle tx-15 border-white-2 me-2"><i
                                class="bi bi-telephone text-white"></i></span>
                        <div class="d-none d-md-block">
                            <a href="javascript:void(0);" class="nav-link tx-15 p-0">Call to Us</a>
                            <a href="tel:{{ $settings->phone ?? '01150099801' }}"
                                class="mb-0 nav-link p-0 tx-13 op-8 lh-sm">{{ $settings->phone ?? '01150099801' }}</a>
                        </div>
                    </li>
                    <li class="d-flex align-items-center position-relative">

                        @if (auth()->check())
                            <span class="avatar bg-white-1 border rounded-circle tx-15 border-white-2 me-2">
                                <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-in-right text-white"></i>
                                </a>
                            </span>
                            <div class="d-none d-md-block">
                                <a href="" class="nav-link tx-15 p-0">{{ auth()->user()->first_name }}</a>
                            </div>
                            @if (auth()->user()->role_name == 'admin')
                                <a style="margin-left: 10px;color:white"
                                    href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            @endif
                        @else
                            <a id="live-chat" href="{{ route('login-page') }}" class="stretched-link"></a>
                            <span class="avatar bg-white-1 border rounded-circle tx-15 border-white-2 me-2">
                                <i class="bi bi-box-arrow-in-right text-white"></i>

                            </span>
                            <div class="d-none d-md-block">
                                <a href="{{ route('login-page') }}" class="nav-link tx-15 p-0">{{ __('Login') }}</a>
                            </div>
                        @endif

                    </li>
                </ul>
            </div>
        </div>
        <!-- End::main-brand-header -->

    </header>
    <div class="sticky">
        <!-- Start::app-sidebar -->
        <aside class="app-sidebar" id="sidebar">

            <div class="app-toggle-header">
                <div class="header-element">
                    <!-- Start::header-link -->
                    <a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                        <span class="close-toggle">
                            <i class="bi bi-x header-link-icon"></i>
                        </span>
                    </a>
                    <!-- End::header-link -->
                </div>
                <!-- End::header-element -->
                <a href="index.html" class="brand-main">
                    <img src="../assets/images/brand/logo-white.png" alt="img" class="desktop-logo logo-dark">
                    <img src="../assets/images/brand/logo-color.png" alt="img" class="desktop-logo logo-color">
                </a>
            </div>

            <!-- Start::main-sidebar -->
            <div class="main-sidebar container" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills sub-open">
                    <ul class="main-menu">

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">Home</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                <li class="slide">
                                    <a href="index.html" class="side-menu__item">
                                        <i class="bi bi-house"></i>
                                        <span class="fw-500 tx-15">Home</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="index-1.html" class="side-menu__item">
                                        <i class="bi bi-sliders"></i>
                                        <span class="fw-500 tx-15">Home1 (Slider Option)</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="index-2.html" class="side-menu__item">
                                        <i class="bi bi-camera-video"></i>
                                        <span class="fw-500 tx-15">Home2 (Video Option)</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">Domains</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                <li class="mega-menu">
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-journal-text tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Registration</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="register-domain.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-secondary-transparent rounded-circle">
                                                                <i class="bi bi-hdd-stack me-0 tx-secondary"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Register a Domain</h6>
                                                            <span class="tx-default tx-14">Book your domain here</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="new-domain-extensions.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-success-transparent rounded-circle">
                                                                <i class="bi bi-plus-circle me-0 tx-success"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">New Domain Extensions</h6>
                                                            <span class="tx-default tx-14">Pre-register to get the name
                                                                of your choice</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="premium-domains.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-purple-transparent rounded-circle">
                                                                <i class="bi bi-gem me-0 tx-purple"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Premium Domains</h6>
                                                            <span class="tx-default tx-14">Register catchy, popular
                                                                Domain Names</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-arrow-left-right tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Transfer</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="domain-transfer.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-pink-transparent rounded-circle">
                                                                <i class="bi bi-arrow-right-circle me-0 tx-pink"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Transfer Your Domains</h6>
                                                            <span class="tx-default tx-14">Move in your existing
                                                                domains</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="domain-transfer.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-info-transparent rounded-circle">
                                                                <i class="bi bi-arrows-move me-0 tx-info"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Bulk Domain Transfer</h6>
                                                            <span class="tx-default tx-14">Move in your existing
                                                                domains</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-plus-circle-dotted tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Add-Ons</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="free-with-domain.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-primary-transparent rounded-circle">
                                                                <i class="bi bi-layers me-0 tx-primary"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Free With Every Domain</h6>
                                                            <span class="tx-default tx-14">Free Email, DNS, Theft
                                                                protection and more</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="name-suggestion-tool.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-danger-transparent rounded-circle">
                                                                <i class="bi bi-gear me-0 tx-danger"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Name Suggestion Tool</h6>
                                                            <span class="tx-default tx-14">Use you name spinner for
                                                                ideas in your domain</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="whois-lookup.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-teal-transparent rounded-circle">
                                                                <i class="bi bi-search me-0 tx-teal"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Whois Lookup</h6>
                                                            <span class="tx-default tx-14">Perform Whois Lookup</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">Websites</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>

                            </a>
                            <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                <li class="mega-menu">
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-bar-chart tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Build Your Website</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="weebly.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-secondary-transparent rounded-circle">
                                                                <i class="bi bi-wikipedia me-0 tx-danger"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Weebly <span
                                                                    class="badge bg-danger blink-text">New</span></h6>
                                                            <span class="tx-default tx-14">Build the beautiful website
                                                                you
                                                                have always imagined, without having to know
                                                                code.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="website-builder.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-success-transparent">
                                                                <i class="bi bi-globe me-0 tx-success"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Website Builder</h6>
                                                            <span class="tx-default tx-14">Create your website
                                                                instantly, no
                                                                coding/design skills required. Choose from over 100
                                                                themes
                                                                or simply drag-and-drop to customize your design.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-palette tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Design Your Website</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-purple-transparent">
                                                                <i class="bi bi-palette2 me-0 tx-purple"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Themes <span
                                                                    class="badge bg-danger blink-text">New</span></h6>
                                                            <span class="tx-default tx-14">Enhance the look and feel of
                                                                your
                                                                website. Select from a wide range of themes and
                                                                templates
                                                                for the web's top CMS platforms.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-danger-transparent">
                                                                <i class="bi bi-code me-0 tx-danger"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Plugins</h6>
                                                            <span class="tx-default tx-14">Download plugins and scripts
                                                                to add
                                                                extra functionality to your website.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-info-transparent">
                                                                <i class="bi bi-emoji-smile me-0 tx-info"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Logos</h6>
                                                            <span class="tx-default tx-14">Choose a customizable
                                                                template and
                                                                design a professional looking logo in minutes.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">Hosting</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>

                            </a>
                            <ul class="slide-menu child1 mega-slide-menu mega-slide-menu-onefr without-icon">
                                <li class="mega-menu">
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-hdd-rack tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Shared Hosting</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="linux-shared-hosting.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-secondary-transparent rounded-circle">
                                                                <i class="bi bi-database me-0 tx-secondary"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Linux Shared Hosting</h6>
                                                            <span class="tx-default tx-14">Perfect for smaller websites
                                                                and
                                                                blogs. Comes with cPanel, PHP, Apache and more.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="windows-shared-hosting.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-success-transparent">
                                                                <i class="bi bi-windows me-0 tx-success"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Windows Shared Hosting</h6>
                                                            <span class="tx-default tx-14">Perfect for smaller websites
                                                                and
                                                                blogs. Comes with Plesk, ASP, IIS and more.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="wordpress-shared-hosting.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-purple-transparent">
                                                                <i class="bi bi-wordpress me-0 tx-purple"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Wordpress Shared
                                                                Hosting</h6>
                                                            <span class="tx-default tx-14">A secure, reliable and
                                                                powerful
                                                                platform crafter for wordpress.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-hdd-network tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Servers</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="virtualserver-linux-hosting.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-pink-transparent">
                                                                <i class="bi bi-hdd-stack me-0 tx-pink"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Linux KVM VPS</h6>
                                                            <span class="tx-default tx-14">With KVM Hypervisor
                                                                implementation
                                                                for a cost effective dedicated server experience.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="dedicated-server.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-primary-transparent">
                                                                <i class="bi bi-hdd-network me-0 tx-primary"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Dedicated Servers</h6>
                                                            <span class="tx-default tx-14">Dedicated hardware and
                                                                rock-solid
                                                                performance. Perfect for larger websites and
                                                                apps.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="windows-dedicated-server.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-danger-transparent">
                                                                <i class="bi bi-windows me-0 tx-danger"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Windows Dedicated
                                                                Servers</h6>
                                                            <span class="tx-default tx-14">Dedicated hardware and
                                                                rock-solid
                                                                performance. Perfect for larger websites and
                                                                apps.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-hdd-stack tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Reseller Hosting</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="linux-reseller-hosting.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-warning-transparent">
                                                                <i class="bi bi-diagram-3 me-0 tx-warning"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Linux Reseller Hosting</h6>
                                                            <span class="tx-default tx-14">Start your hosting business
                                                                today.
                                                                Comes with free WHM, cPanel and WHMCS.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="windows-reseller-hosting.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-teal-transparent">
                                                                <i class="bi bi-windows me-0 tx-teal"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Windows Reseller
                                                                Hosting</h6>
                                                            <span class="tx-default tx-14">Start your hosting business
                                                                today.
                                                                Comes with free Plesk and WHMCS.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-nut tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Tools</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="codeguard-backup.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-purple-transparent">
                                                                <i class="bi bi-shield-lock me-0 tx-purple"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Codegaurd Website
                                                                Backup</h6>
                                                            <span class="tx-default tx-14">Your data is precious.
                                                                Secure your
                                                                website in just a few minues.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="sitelock.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-secondary-transparent">
                                                                <i
                                                                    class="bi bi-file-earmark-lock me-0 tx-secondary"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">SiteLock Malware
                                                                Detector</h6>
                                                            <span class="tx-default tx-14">Over 5000 websites get
                                                                attacked
                                                                everyday. Get SiteLock and secure your website from
                                                                hackers,
                                                                viruses and malware.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="acronis-backup.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-info-transparent">
                                                                <i class="bi bi-cloud-download me-0 tx-info"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Acronis Cyber Backup <span
                                                                    class="badge bg-danger blink-text">New</span></h6>
                                                            <span class="tx-default tx-14">Backup your data on the
                                                                cloud-recover any time.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">Cloud</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-slide-menu-onefr">
                                <li class="mega-menu">
                                    <div class="">
                                        <ul>
                                            <li class="slide">
                                                <a href="cloud.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-warning-transparent rounded-circle">
                                                                <i class="bi bi-cloud me-0 tx-warning"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Cloud</h6>
                                                            <span class="tx-default tx-14">Power your business with
                                                                Cloud. 2x
                                                                faster and 4x scalable.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="professional-cloud.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-purple-transparent">
                                                                <i class="bi bi-cloud-fog2 me-0 tx-purple"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Professional Cloud</h6>
                                                            <span class="tx-default tx-14">Get cloud power and
                                                                flexibility
                                                                with the simplicity of fully managed servers.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">Email & Productivity</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                <li class="mega-menu">
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-envelope tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Email</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="business-email.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-teal-transparent rounded-circle">
                                                                <i class="bi bi-envelope me-0 tx-teal"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Business Email</h6>
                                                            <span class="tx-default tx-14">Simple and powerful
                                                                webmail.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li>
                                                <p class="mb-3 d-flex align-items-center menu-label">
                                                    <i class="bi bi-envelope-plus tx-primary tx-18 me-2"></i>
                                                    <span class="tx-14 tx-primary">Email &amp; Productvity</span>
                                                </p>
                                            </li>
                                            <li class="slide">
                                                <a href="google-workspace.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-secondary-transparent">
                                                                <i class="bi bi-google me-0 tx-secondary"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Google Workspace</h6>
                                                            <span class="tx-default tx-14">Cloud based email and
                                                                productivity
                                                                suite.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="enterprise-email.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-purple-transparent">
                                                                <i class="bi bi-inbox me-0 tx-purple"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Enterprise Email <span
                                                                    class="badge bg-danger blink-text">New</span></h6>
                                                            <span class="tx-default tx-14">Advanced and Corporate-class
                                                                email.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">Security</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-slide-menu-onefr">
                                <li class="mega-menu">
                                    <div class="">
                                        <ul>
                                            <li class="slide">
                                                <a href="ssl-certificates.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 bg-secondary-transparent rounded-circle">
                                                                <i class="bi bi-patch-check me-0 tx-secondary"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">SSL Certificates</h6>
                                                            <span class="tx-default tx-14">Powerful encryption for your
                                                                data.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="sitelock.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-purple-transparent">
                                                                <i class="bi bi-person-lock me-0 tx-purple"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">SiteLock</h6>
                                                            <span class="tx-default tx-14">Over 500 widgets get
                                                                attacked
                                                                everyday. Get SiteLock and secure your website from
                                                                hackers,
                                                                viruses and malware.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="slide">
                                                <a href="codeguard-backup.html" class="side-menu__item">
                                                    <div class="d-lg-flex align-items-start">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar header__dropavatar mb-2 rounded-circle bg-success-transparent">
                                                                <i class="bi bi-code-slash me-0 tx-success"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="d-block mb-1">Codegaurd Website
                                                                Backup</h6>
                                                            <span class="tx-default tx-14">Your data is preciuos.
                                                                Secure your
                                                                website in just a few minutes.</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">Pages</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                <li class="slide">
                                    <a href="about.html" class="side-menu__item">
                                        <i class="bi bi-house"></i>
                                        <span class="fw-500 tx-15">About Us</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="blog.html" class="side-menu__item">
                                        <i class="bi bi-box"></i>
                                        <span class="fw-500 tx-15">Blog</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="blog-details.html" class="side-menu__item">
                                        <i class="bi bi-activity"></i>
                                        <span class="fw-500 tx-15">Blog Details</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="contact-us.html" class="side-menu__item">
                                        <i class="bi bi-telephone"></i>
                                        <span class="fw-500 tx-15">Contact Us</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="faqs.html" class="side-menu__item">
                                        <i class="bi bi-question-octagon"></i>
                                        <span class="fw-500 tx-15">FAQ</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="switcher.html" class="side-menu__item">
                                        <i class="bi bi-gear"></i>
                                        <span class="fw-500 tx-15">Switcher</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="login.html" class="side-menu__item">
                                        <i class="bi bi-lock"></i>
                                        <span class="fw-500 tx-15">Login Style 1</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="login-1.html" class="side-menu__item">
                                        <i class="bi bi-shield-check"></i>
                                        <span class="fw-500 tx-15">Login Style 2</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="register.html" class="side-menu__item">
                                        <i class="bi bi-layers"></i>
                                        <span class="fw-500 tx-15">Register Style 1</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="register-1.html" class="side-menu__item">
                                        <i class="bi bi-box-seam"></i>
                                        <span class="fw-500 tx-15">Register Style 2</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="forgot-password.html" class="side-menu__item">
                                        <i class="bi bi-shield-lock"></i>
                                        <span class="fw-500 tx-15">Forgot Password</span>
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="under-maintenance.html" class="side-menu__item">
                                        <i class="bi bi-gear-wide-connected"></i>
                                        <span class="fw-500 tx-15">Under Maintenance</span>
                                    </a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">
                                        <div class="d-flex">
                                            <i class="bi bi-files-alt"></i>
                                            <span class="fw-500 tx-15">Submenus</span>
                                        </div>
                                        <span class="fe fe-chevron-right side-menu__angle"></span>
                                    </a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="javascript:void(0);" class="side-menu__item">
                                                <span class="fw-500 tx-15">Level - 1</span>
                                            </a>
                                        </li>
                                        <li class="slide has-sub">
                                            <a href="javascript:void(0);" class="side-menu__item">
                                                <span class="fw-500 tx-15">Level - 2</span>
                                                <span class="fe fe-chevron-right side-menu__angle"></span>
                                            </a>
                                            <ul class="slide-menu child3">
                                                <li class="slide">
                                                    <a href="javascript:void(0);" class="side-menu__item">
                                                        <span class="fw-500 tx-15">Level - 2.1</span>
                                                    </a>
                                                </li>
                                                <li class="slide">
                                                    <a href="javascript:void(0);" class="side-menu__item">
                                                        <span class="fw-500 tx-15">Level - 2.2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="https://themes.spruko.com/customer/index.php?systpl=hostma-hosting"
                                class="side-menu__item">
                                <span class="side-menu__label">WHMCS</span>

                            </a>
                        </li>
                        <!-- End::slide -->

                    </ul>
                    {{-- <div class="d-xl-flex d-lg-none d-grid gap-2 text-center">
                        <a href="register.html" class="btn btn-secondary min-w-fit-content">Register</a>
                        <a href="login.html" class="btn btn-outline-light login-btn min-w-fit-content">Login</a>
                    </div> --}}

                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->
    </div>
</div>
