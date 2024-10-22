@extends('layouts.home')
@section('title')
    {{ __('general.home') }}
    <?php $lang = config('app.locale'); ?>
    {{-- {{ $lang == 'ar' ? 'مقدمين الخدمات' : 'Service Provider' }} --}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('css/css-stars.css') }}">
    <style>
        .stars-card {
            min-height: 20px;
        }

        .stars-card svg {
            margin-right: 3px;
            color: #818894;
        }

        .stars-card svg.active {
            color: #ffc600;
            fill: #ffc600;
        }

        .stars-card i.active svg {
            color: #ffc600;
            fill: #ffc600;
        }
    </style>
@endsection
@section('content')
    <?php
    $settings = App\Models\Settings::first();
    $departments = App\Models\Department::limit(4)->get();
    $posts_count = App\Models\Post::count();
    $order_count = App\Models\Order::count();
    $users_count = App\Models\User::count();
    $providers_count = App\Models\User::where('role_id', 3)->count();
    $users = App\Models\User::where('role_id', 3)->limit(6)->get();
    ?>
    <section class="section overflow-hidden">
        <img src="../assets/images/patterns/2.png" alt="img" class="patterns-6 op-1 z-index-0 top-14p">
        <img src="../assets/images/patterns/7.png" alt="img" class="patterns-5 left-0 transform-rotate-180 z-index-0">
        <div class="container">
            <div class="row">
                <div class="heading-section">
                    <div class="heading-subtitle">
                        <span class="tx-primary tx-16 fw-semibold">{{ __('department.departments') }}</span>
                    </div>
                </div>
                
                @forelse ($departments as $department)
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <a href="{{ route('departments.show', $department->id) }}">
                            <div class="card border feature-card-15 mb-xl-0">
                                <div class="card-body text-center">
                                    @if ($department->image)
                                        <span class="avatar avatar-lg rounded-circle bg-primary text-white mb-3 tx-22">
                                            <img src="{{ $department->image_url }}" alt="" width="40px" height="40px">
                                        </span>
                                    @else
                                        <span class="avatar avatar-lg rounded-circle bg-primary text-white mb-3 tx-22">
                                            <i class="bi bi-gem"></i>
                                        </span>
                                    @endif
                                    <h5>{{ $lang == 'ar' ? $department->name_ar : $department->name_en }}</h5>
                                    <p class="mb-0">
                                        {{ $lang == 'ar' ? $department->description_ar : $department->description_en }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>{{ __('department.no_departments_found') }}</p>
                @endforelse
    
            </div>
        </div>
    </section>
    
    {{-- <section class="section overflow-hidden">
        <img src="../assets/images/patterns/2.png" alt="img" class="patterns-6 op-1 z-index-0 top-14p">
        <img src="../assets/images/patterns/7.png" alt="img" class="patterns-5 left-0 transform-rotate-180 z-index-0">
        <div class="container">
            <div class="row">
                <div class="heading-section">
                    <div class="heading-subtitle"><span
                            class="tx-primary tx-16 fw-semibold">{{ __('department.departments') }}</span></div>
                    {{-- <div class="heading-title">Best Services You <span class="tx-primary">Get</span></div>
                <div class="heading-description">Domain & Hosting Services</div> 
                </div>
                @forelse ($departments as $department)
                    <a href="{{ route('departments.show' , $department->id) }}">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card border feature-card-15 mb-xl-0">
                                <div class="card-body text-center">
                                    @if ($department->image)
                                        <span class="avatar avatar-lg rounded-circle bg-primary text-white mb-3 tx-22"><img
                                                src="{{ $department->image_url }}" alt="" width="40px"
                                                height="40px"></span>
                                    @else
                                        <span class="avatar avatar-lg rounded-circle bg-primary text-white mb-3 tx-22"><i
                                                class="bi bi-gem"></i></span>
                                    @endif
                                    <h5>{{ $lang == 'ar' ? $department->name_ar : $department->name_en }}</h5>
                                    <p class="mb-0">
                                        {{ $lang == 'ar' ? $department->description_ar : $department->description_en }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                @endforelse

            </div>
        </div>
    </section> --}}
    <section class="section bg-pattern-2 bg-image2">
        <div class="container">
            <div class="heading-section">
                <div class="heading-title text-white">{{ __('general.why') }}</div>
                <div class="heading-description text-white op-8">
                </div>
            </div>
            <div class="row align-items-center">
                <?php ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center feature-card-16 mb-lg-0">
                        <div class="card-body">
                            <svg class="feature-icon br-style1 primary mb-3" xmlns="http://www.w3.org/2000/svg"
                                height="60" width="60" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <path fill="#729af0"
                                    d="M15 20.5H7c-1.7 0-3-1.3-3-3v-5.3c0-.6.4-1 1-1h12c.6 0 1 .4 1 1v5.3c0 1.7-1.3 3-3 3z" />
                                <path fill="#1457e6"
                                    d="m21.5 10.2-1-.5-9-5c-.3-.2-.7-.2-1 0l-9 5c-.5.2-.6.8-.4 1.3.1.2.2.3.4.4l9 5c.3.2.7.2 1 0l8.5-4.7v2.9c0 .6.4 1 1 1s1-.4 1-1v-3.4c0-.5-.2-.8-.5-1z" />
                            </svg>
                            <h4 class="">{{ __('posts.posts') }}</h4>
                            <h2 class="counter tx-primary  mb-0">{{ $posts_count ? $posts_count : 0 }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center feature-card-16 mb-lg-0 secondary">
                        <div class="card-body">
                            <svg class="feature-icon br-style1 secondary mb-3" xmlns="http://www.w3.org/2000/svg"
                                height="60" width="60" viewBox="0 0 24 24">
                                <path fill="#fcbf8e"
                                    d="M10.47217,20a8.46717,8.46717,0,0,1-5.99072-2.48047h0A8.47313,8.47313,0,0,1,2.14893,9.94531a.99874.99874,0,0,1,.79638-.79687,8.47246,8.47246,0,0,1,9.90674,9.90625.99874.99874,0,0,1-.79639.79687A8.52785,8.52785,0,0,1,10.47217,20Z">
                                </path>
                                <path fill="#fcbf8e"
                                    d="M13.52783,20a8.52785,8.52785,0,0,1-1.58349-.14844.99874.99874,0,0,1-.79639-.79687,8.47246,8.47246,0,0,1,9.90674-9.90625.99874.99874,0,0,1,.79638.79687,8.47313,8.47313,0,0,1-2.33252,7.57422h0A8.47125,8.47125,0,0,1,13.52783,20Zm5.28369-3.1875h0Z">
                                </path>
                                <path fill="#fb9543"
                                    d="M12,20a.99654.99654,0,0,1-.56348-.17383,9.46579,9.46579,0,0,1,0-15.65234.99789.99789,0,0,1,1.127,0,9.46579,9.46579,0,0,1,0,15.65234A.99654.99654,0,0,1,12,20Z">
                                </path>
                            </svg>
                            <h4 class="">{{ __('order.orders') }}</h4>
                            <h2 class="counter tx-secondary  mb-0">{{ $order_count ? $order_count : 0 }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center feature-card-16 mb-lg-0 success">
                        <div class="card-body">
                            <svg class="feature-icon br-style1 success mb-3" xmlns="http://www.w3.org/2000/svg"
                                height="60" width="60" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                <path fill="#73dfa4" d="M12 14a6 6 0 1 1 6-6 6.007 6.007 0 0 1-6 6z" />
                                <path fill="#17ca68"
                                    d="M15.7 12.713a5.975 5.975 0 0 1-7.405 0 9.992 9.992 0 0 0-6.23 8.179 1 1 0 0 0 .886 1.102L20.94 22a1 1 0 0 0 .995-1.108 9.995 9.995 0 0 0-6.233-8.179z" />
                            </svg>
                            <h4 class="">{{ __('user.All_User') }}</h4>
                            <h2 class="counter tx-success  mb-0">{{ $users_count ? $users_count : 0 }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center feature-card-16 mb-lg-0 danger">
                        <div class="card-body">
                            <svg class="feature-icon br-style1 danger mb-3" xmlns="http://www.w3.org/2000/svg"
                                height="60" width="60" data-name="Layer 1" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" fill="#ea858f" />
                                <path fill="#dc3545"
                                    d="M12 17.092a5.68 5.68 0 0 1-3.643-1.325 1 1 0 1 1 1.286-1.534 3.76 3.76 0 0 0 4.714 0 1 1 0 0 1 1.286 1.534A5.68 5.68 0 0 1 12 17.092zm-2.086-6.256a.997.997 0 0 1-.707-.293 1.033 1.033 0 0 0-1.414 0 1 1 0 1 1-1.414-1.414 3.072 3.072 0 0 1 4.242 0 1 1 0 0 1-.707 1.707zm7 0a.997.997 0 0 1-.707-.293 1.033 1.033 0 0 0-1.414 0 1 1 0 0 1-1.414-1.414 3.072 3.072 0 0 1 4.242 0 1 1 0 0 1-.707 1.707z" />
                            </svg>
                            <h4 class="">{{ __('user.providers') }}</h4>
                            <h2 class="counter tx-danger  mb-0">{{ $providers_count ? $providers_count : 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="heading-section">
                <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">{{ __('user.providers') }}</span>
                </div>
                <div class="heading-title">{{ __('user.providers') }}</div>
                <div class="heading-description"> </div>
            </div>
            <div class="row">
                {{-- <div class="col-lg-4"> --}}
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                @forelse ($users as $user)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="position-relative">

                                                <a href="{{ route('web.profile', $user->id) }}">
                                                    @if ($user->image)
                                                        <img class="card-img-top" src="{{ $user->image_url }}"
                                                            alt="img">
                                                    @endif
                                                </a>
                                                {{-- <span class="badge bg-secondary blog-badge">{{ $user->add_order }}</span> --}}
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <h5><a
                                                        href="{{ route('web.profile', $user->id) }}">{{ $user->first_name . ' ' . $user->last_name }}</a>
                                                </h5>
                                                <div class="tx-muted">{{ $user->description }}</div>
                                                <div class="d-flex align-items-center pt-4 mt-auto">
                                                    {{-- <div class="avatar me-3 cover-image rounded-circle">
                                                            <img src="{{ $user->image_url ?? asset('images/user.png') }}"
                                                                class="rounded-circle" alt="img" width="40">
                                                        </div> --}}
                                                    <div>
                                                        <div class="stars-card d-flex align-items-center ">
                                                            @php
                                                                $i = 5;

                                                                $rate = $user->rates();
                                                            @endphp
                                                            @if ($user->role_id == 3)
                                                                <div class="stars-card d-flex align-items-center ">


                                                                    @while (--$i >= 5 - $rate)
                                                                        <i data-feather="star" width="20"
                                                                            height="20" class="active"></i>
                                                                    @endwhile
                                                                    @while ($i-- >= 0)
                                                                        <i data-feather="star" width="20"
                                                                            height="20" class=""></i>
                                                                    @endwhile
                                                                    <span
                                                                        class="badge badge-primary ml-10 bg-primary">{{ $rate }}</span>

                                                                </div>
                                                            @endif
                                                        </div>

                                                    </div>
                                                    {{-- <div class="ms-auto">
                                                    <a href="javascript:void(0)" class="icon d-inline-block tx-muted"><i class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i></a>
                                                </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    {!! no_data() !!}
                                @endforelse

                            </div>

                        </div>
                        <!-- COL-END -->

                        {{-- <div class="card">
                                <div class="card-body">
                                    <form action="javascript:void(0);" class="form">
                                        <div class="form-group custom-form-group">
                                            <input type="text" class="form-control form-control-lg rounded-pill" placeholder="Find your Blog here...">
                                            <button class="custom-form-btn btn btn-lg btn-primary bg-primary-gradient rounded-pill border-0" type="button" id="btn-addon">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}



                        {{-- <div class="card">
                                <div class="card-body">
                                    <p class="h5 mb-4">Tags</p>
                                    <div class="tags">
                                        <a href="javascript:void(0)" class="tag">Hosting</a>
                                        <a href="javascript:void(0)" class="tag">Servers</a>
                                        <a href="javascript:void(0)" class="tag">Email</a>
                                        <a href="javascript:void(0)" class="tag">Linux Servers</a>
                                        <a href="javascript:void(0)" class="tag">Windows Servers</a>
                                        <a href="javascript:void(0)" class="tag">KVM Servers</a>
                                        <a href="javascript:void(0)" class="tag">Domain Transfer</a>
                                        <a href="javascript:void(0)" class="tag">Domain Registration</a>
                                    </div>
                                </div>
                            </div> --}}

                    </div>
                    {{-- </div> --}}
                </div>
            </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="heading-section">
                <div class="heading-subtitle"><span
                        class="tx-primary tx-16 fw-semibold">{{ __('general.about_us') }}</span></div>
                <div class="heading-title">{{ __('general.about_us') }}</div>
                <div class="heading-description"> </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            @if ($settings->about_us)
                                <p>{{ $settings->about_us }}</p>
                            @else
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam voluptatem at sunt
                                    incidunt nobis rerum magni sint blanditiis autem distinctio. Blanditiis iste quae eius
                                    provident quo ea molestias, temporibus commodi?</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('script')
    {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}
    <script src="{{ asset('js/feather-icons/dist/feather.min.js') }}"></script>
    <script>
        feather.replace();
    </script>
    {{-- import feather from 'feather-icons';
    feather.replace(); --}}
@endsection
