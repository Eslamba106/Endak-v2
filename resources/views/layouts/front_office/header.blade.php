<div class="head_menu_container">
    <?php $settings = App\Models\Settings::first();
    $lang = config('app.locale');
    if (auth()->check()) {
        $user = auth()->user();
    }
    ?>
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
                    <a href="#" class="brand-main">
                        <img src="{{ $settings->image_url ?? '' }}" width="150" height="50" alt="img"
                            class="desktop-logo logo-dark">
                        {{-- <img src="../assets/images/brand/toggle-dark.png" alt="img"
                            class="mobile-logo mobile-dark mx-3">
                        <img src="../assets/images/brand/logo-color.png" alt="img" class="desktop-logo logo-color">
                        <img src="../assets/images/brand/toggle-color.png" alt="img"
                            class="mobile-logo mobile-color"> --}}
                    </a>

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
                                <a href="" class="nav-link tx-15 p-0">{{ $user->first_name }}</a>
                            </div>
                            @if ($user->role_name == 'admin')
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
                {{-- <a href="index.html" class="brand-main">
                    <img src="../assets/images/brand/logo-white.png" alt="img" class="desktop-logo logo-dark">
                    <img src="../assets/images/brand/logo-color.png" alt="img" class="desktop-logo logo-color">
                </a> --}}
            </div>

            <!-- Start::main-sidebar -->
            <div class="main-sidebar container" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills sub-open">
                    <ul class="main-menu">

                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('home') }}" class="side-menu__item">
                                <span class="side-menu__label">Home</span>
                                {{-- <i class="fe fe-chevron-down side-menu__angle"></i> --}}
                            </a>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="{{ route('departments') }}" class="side-menu__item">
                                <span class="side-menu__label">{{ __('department.departments') }}</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <?php $departments = App\Models\Department::paginate(5); ?>
                            <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                <li class="mega-menu">
                                    @forelse ($departments as $department)
                                        <div class="">
                                            <ul>
                                                <li>
                                                    <p class="mb-3 d-flex align-items-center menu-label">
                                                        <span class="category-loop-icon">

                                                            <i class="la {{ $department->icon_class }}"
                                                                data-toggle="tooltip" title="Category"></i>

                                                        </span> <span
                                                            class="tx-14 tx-primary">{{ $lang == 'ar' ? $department->name_ar : $department->name_en }}</span>
                                                    </p>
                                                </li>
                                                @forelse ($department->sub_Departments as $sub_Department)
                                                    <li class="slide">
                                                        <a href="{{ route('web.posts', $sub_Department->id) }}"
                                                            class="side-menu__item">
                                                            <div class="d-lg-flex align-items-start">
                                                                <div class="me-3">
                                                                    <span
                                                                        class="avatar header__dropavatar mb-2 bg-secondary-transparent rounded-circle">
                                                                        <i
                                                                            class="bi bi-hdd-stack me-0 tx-secondary"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block mb-1">
                                                                        {{ $lang == 'ar' ? $sub_Department->name_ar : $sub_Department->name_en }}
                                                                    </h6>
                                                                    <span
                                                                        class="tx-default tx-14">{{ $lang == 'ar' ? $sub_Department->description_ar : $sub_Department->description_en }}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                @endforelse


                                            </ul>
                                        </div>
                                    @empty
                                    @endforelse


                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->


                        <!-- Start::slide -->
                        <?php $pages = App\Models\Page::paginate(5); ?>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class="side-menu__label">{{ __('page.pages') }}</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-slide-menu-onefr without-icon">
                                @forelse ($pages as $page)
                                    <li class="slide">
                                        <a href="{{ route('page', $page->slug) }}" class="side-menu__item">
                                            <i class="bi bi-house"></i>
                                            <span
                                                class="fw-500 tx-15">{{ $lang == 'ar' ? $page->title_ar : $page->title_en }}</span>
                                        </a>
                                    </li>
                                @empty
                                @endforelse

                                <li class="slide">
                                    <a href="switcher.html" class="side-menu__item">
                                        <i class="bi bi-gear"></i>
                                        <span class="fw-500 tx-15">Switcher</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        {{-- <?php
                        
                        $posts = App\Models\Post::where('user_id', $user->id)->get();
                        ?> --}}
                        @if (auth()->check())
                            <li class="slide">
                                <a href="{{ route('web.posts.my_posts', $user->id) }}" class="side-menu__item">
                                    <span class="side-menu__label">{{ __('posts.my_posts') }}</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>
                                </a>

                            </li>
                        @endif
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
