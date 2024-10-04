@extends('layouts.home')
@section('title')
    <?php $lang = config('app.locale'); ?>
    {{ $lang == 'ar' ? 'الصفحة الشخصية' : 'Profile' }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('css/css-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('css/video-js.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
        .profile-cover-container {
            position: relative;
            width: 100%;
            height: 400px;
            background-color: #f5f5f5;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            /* لتكون الصورة دائرية */
            margin: 0 auto;
            display: block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-content {
            padding-top: 20px;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-info .user-name {
            font-size: 22px;
            color: #333;
            margin-top: 15px;
        }

        .user-info .user-role {
            font-size: 16px;
            color: #777;
        }

        .user-stats .stat-item {
            text-align: center;
            margin-right: 20px;
        }

        .user-stats .stat-value {
            font-size: 24px;
            color: #333;
        }

        .user-stats .stat-label {
            font-size: 14px;
            color: #777;
        }

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
    <section class="profile-cover-container">
        @if (auth()->check())
            @if (auth()->user()->id == $user->id)
                <a href="{{ route('web.profile.edit', $user->id) }}" class="btn btn-primary m-3">تعديل الملف الشخصي</a>
            @endif
        @endif
        @if ($user->image )
            <img src="{{ $user->image_url }}" class="img-cover profile-img" alt="{{ $user->first_name }}" />
        @else
            <img src="{{ asset('images/user.png') }}" class="img-cover profile-img" alt="{{ $user->first_name }}" />
        @endif
        <div class="profile-content pt-40">
            <div class="container position-relative">
                <div
                    class="profile-card d-flex flex-column flex-md-row align-items-center justify-content-between rounded-lg shadow-xs bg-white p-15 p-md-30">

                    <div class="user-info d-flex flex-column align-items-center text-center">
                        <strong class="user-name font-20 text-dark-blue font-weight-bold">{{ $user->first_name }}
                            {{ $user->last_name }}</strong>
                        <span class="user-role font-14 text-gray">{{ $user->role }}</span>
                    </div>

                    @php
                        $i = 5;

                        $rate = $user->rates();
                    @endphp
                    @if ($user->role_id == 3)
                        <div class="stars-card d-flex align-items-center ">


                            @while (--$i >= 5 - $rate)
                                <i data-feather="star" width="20" height="20" class="active"></i>
                            @endwhile
                            @while ($i-- >= 0)
                                <i data-feather="star" width="20" height="20" class=""></i>
                            @endwhile
                            <span class="badge badge-primary ml-10 bg-primary">{{ $rate }}</span>

                        </div>
                    @endif
                    <div class="user-stats d-flex justify-content-between mt-20 mt-md-0 mb-30 mb-md-0">
                        @if ($user->role_id == 3)
                            <div class="stat-item">
                                <strong class="stat-value font-20">{{ count($user->orders) }}</strong>
                                <span class="stat-label font-14 text-gray">{{ trans('panel.courses') }}</span>
                            </div>
                        @endif
                        @if ($user->role_id == 1)
                            <div class="stat-item">
                                <strong class="stat-value font-20">{{ count($user->myorders) }}</strong>
                                <span class="stat-label font-14 text-gray">{{ trans('order.order_complete_count') }}</span>
                            </div>
                        @endif
                    </div>

                </div>
                {{-- <a href="">تعديل الملف الشخصي</a> --}}


            </div>


        </div>


    </section>
    <div style="margin-top: -90px " class=" mb-5">
        <div class="profile-content pt-40">
            <div class="container position-relative">
                <div
                    class="profile-card d-flex flex-column flex-md-row align-items-center justify-content-between rounded-lg shadow-xs bg-white mb-5 mt-5  p-15 p-md-30">
                    <p class="mb-2">
                        <strong>About Me : </strong>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur consequatur necessitatibus error
                        maxime, quo consectetur vel porro repellendus harum molestias? Expedita inventore perspiciatis ipsam
                        facere quae rerum nihil. Expedita, illum.
                    </p>
                </div>
            </div>
        </div>
    </div>
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
