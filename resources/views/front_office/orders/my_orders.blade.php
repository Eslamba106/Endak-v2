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

        <div class="profile-content pt-40">
            <div class="container position-relative d-flex justify-content-center ">
                @forelse ($orders as $order)
                    <form action="" method="POST" enctype="multipart/form-data" style="width:900px"
                        class="profile-card rounded-lg shadow-xs bg-white p-15 p-md-30">
                        <div class="profile-content pt-40">
                            <div class="container position-relative d-flex justify-content-center ">
                              
                                <div class="col-xl-4 col-lg-9 col-md-8 col-sm-8 mb-2">
                                    <span
                                        class="badge  {{ $order->status == 'complete' ? 'bg-primary-transparent tx-primary ' : ' bg-danger-transparent tx-danger' }} me-1 mb-1 mt-3 mt-sm-0">{{ $order->status }}</span>
                                    <h6 class="mb-0"><a href=" "> </a>{{ $order->title }}</h6>

                                    {{-- <p class="tx-muted">{{ $order->description }}</p> --}}
                                </div>
                                <div class="col-xl-8 col-lg-9 col-md-8 col-sm-8 mb-2"> 
                                    <p>{{ $order->description }}</p>
                                    <hr>
                                    <a href="{{ route('web.order.view' , $order->id) }}" class="btn btn-primary">{{ __('order.show') }}</a>
                                </div>

                                

                                {{-- </div> --}}
                            </div>

                        </div>
                    </form>
                @empty
                    {!! no_data() !!}
                @endforelse

            </div>


        </div>


    </section>
    {{-- <section class="profile-cover-container"  >

        <div class="profile-content pt-40"  >
            <div  class="container position-relative d-flex justify-content-center " >
                <div style="width:700px"  class="profile-card rounded-lg shadow-xs bg-white p-15 p-md-30 row mb-3 mb-xl-0">
                    @forelse ($orders as $order)
                        <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 text-center">
                            <img src="../assets/images/blog/6.jpg" class="img-fluid br-5 w-100" width="120" alt="img">
                        </div>
                        <div class="col-xl-8 col-lg-9 col-md-8 col-sm-8">
                            <span class="badge  {{ ($order->status == 'complete') ? 'bg-primary-transparent tx-primary ' : ' bg-danger-transparent tx-danger' }} me-1 mb-1 mt-3 mt-sm-0">{{ $order->status }}</span>
                            <h6 class="mb-0"><a href=" ">  </a>{{ $order->title }}</h6>
                            <p class="tx-muted">{{ $order->description }}</p>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section> --}}
@endsection
