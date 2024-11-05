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
    <section class="profile-cover-container" style="height:800px;">

        <div class="profile-content pt-40">
            <div
                class="container position-relative d-flex  justify-content-center profile-card rounded-lg shadow-xs bg-white p-15 p-md-30  ">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>

                        @if ($order->service_provider_id != null)
                            <?php $service_provider = App\Models\User::where('id', $order->service_provider_id)->first(); ?>
                            <tr>
                                <td class="width30">{{ $service_provider->first_name . ' ' . $service_provider->last_name }}
                                </td>
                            </tr>
                        @endif
                        @if ($order->title != null)
                            <tr>
                                <td class="width30">{{ $order->title }}</td>
                            </tr>
                        @endif
                        
                        @if ($order->notes != null)
                            <tr>
                                <td class="width30">{{ $order->notes }}</td>
                            </tr>
                        @endif

                        @if ($order->price != null)
                            <tr>
                                <td class="width30">{{ $order->price }}</td>
                            </tr>
                        @endif



                        @if ($order->description != null)
                            <tr>
                                <td class="width30">{{ $order->description }}</td>
                            </tr>
                        @endif

                        @if ($order->days_count != null)
                            <tr>
                                <td class="width30">{{ $order->days_count }}</td>
                            </tr>
                        @endif

                        @if ($order->count != null)
                            <tr>
                                <td class="width30">{{ $order->count }}</td>
                            </tr>
                        @endif

                        @if ($order->status != null)
                            <tr>
                                <td class="width30">{{ $order->status }}</td>
                            </tr>
                        @endif

                        @if ($order->from_city != null)
                            <tr>
                                <td class="width30">{{ $order->from_city }}</td>
                            </tr>
                        @endif

                        @if ($order->from_neighborhood != null)
                            <tr>
                                <td class="width30">{{ $order->from_neighborhood }}</td>
                            </tr>
                        @endif

                        @if ($order->city != null)
                            <tr>
                                <td class="width30">{{ $order->city }}</td>
                            </tr>
                        @endif

                        @if ($order->neighborhood != null)
                            <tr>
                                <td class="width30">{{ $order->neighborhood }}</td>
                            </tr>
                        @endif

                        @if ($order->from_floor != null)
                            <tr>
                                <td class="width30">{{ $order->from_floor }}</td>
                            </tr>
                        @endif
                        @if ($order->from_house != null)
                            <tr>
                                <td class="width30">{{ $order->from_house }}</td>
                            </tr>
                        @endif
                        @if ($order->to_city != null)
                            <tr>
                                <td class="width30">{{ $order->to_city }}</td>
                            </tr>
                        @endif
                        @if ($order->to_neighborhood != null)
                            <tr>
                                <td class="width30">{{ $order->to_neighborhood }}</td>
                            </tr>
                        @endif
                        @if ($order->to_floor != null)
                            <tr>
                                <td class="width30">{{ $order->to_floor }}</td>
                            </tr>
                        @endif
                        @if ($order->to_house != null)
                            <tr>
                                <td class="width30">{{ $order->to_house }}</td>
                            </tr>
                        @endif
                        @if ($order->image != null)
                            <tr>
                                <td class="width30">{{ $order->image_url }}</td>
                            </tr>
                        @endif
                        @if ($order->video != null)
                            <tr>
                                <td class="width30">{{ $order->video }}</td>
                            </tr>
                        @endif
                        @if ($order->explain != null)
                            <tr>
                                <td class="width30">{{ $order->explain }}</td>
                            </tr>
                        @endif
                        @if ($order->modal != null)
                            <tr>
                                <td class="width30">{{ $order->modal }}</td>
                            </tr>
                        @endif
                        @if ($order->manufacturing_year != null)
                            <tr>
                                <td class="width30">{{ $order->manufacturing_year }}</td>
                            </tr>
                        @endif
                        @if ($order->section != null)
                            <tr>
                                <td class="width30">{{ $order->section }}</td>
                            </tr>
                        @endif
                        @if ($order->code_number != null)
                            <tr>
                                <td class="width30">{{ $order->code_number }}</td>
                            </tr>
                        @endif
                        @if ($order->name != null)
                            <tr>
                                <td class="width30">{{ $order->name }}</td>
                            </tr>
                        @endif
                        @if ($order->cars != null)
                            <tr>
                                <td class="width30">{{ $order->cars }}</td>
                            </tr>
                        @endif
                        @if ($order->clean != null)
                            <tr>
                                <td class="width30">{{ $order->clean }}</td>
                            </tr>
                        @endif
                        @if ($order->Verion != null)
                            <tr>
                                <td class="width30">{{ $order->Verion }}</td>
                            </tr>
                        @endif
                        @if ($order->weight != null)
                            <tr>
                                <td class="width30">{{ $order->weight }}</td>
                            </tr>
                        @endif
                        @if ($order->fixed != null)
                            <tr>
                                <td class="width30">{{ $order->fixed }}</td>
                            </tr>
                        @endif
                        @if ($order->fingerprint != null)
                            <tr>
                                <td class="width30">{{ $order->fingerprint }}</td>
                            </tr>
                        @endif
                        @if ($order->camera != null)
                            <tr>
                                <td class="width30">{{ $order->camera }}</td>
                            </tr>
                        @endif
                        @if ($order->type != null)
                            <tr>
                                <td class="width30">{{ $order->type }}</td>
                            </tr>
                        @endif
                        @if ($order->smart != null)
                            <tr>
                                <td class="width30">{{ $order->smart }}</td>
                            </tr>
                        @endif
                        @if ($order->system_security != null)
                            <tr>
                                <td class="width30">{{ $order->system_security }}</td>
                            </tr>
                        @endif
                        @if ($order->fire_system != null)
                            <tr>
                                <td class="width30">{{ $order->fire_system }}</td>
                            </tr>
                        @endif
                        @if ($order->networks != null)
                            <tr>
                                <td class="width30">{{ $order->networks }}</td>
                            </tr>
                        @endif
                        @if ($order->time != null)
                            <tr>
                                <td class="width30">{{ $order->time }}</td>
                            </tr>
                        @endif
                        @if ($order->gender != null)
                            <tr>
                                <td class="width30">{{ $order->gender }}</td>
                            </tr>
                        @endif
                        @if ($order->food != null)
                            <tr>
                                <td class="width30">{{ $order->food }}</td>
                            </tr>
                        @endif
                        @if ($order->date != null)
                            <tr>
                                <td class="width30">{{ $order->date }}</td>
                            </tr>
                        @endif
                        @if ($order->size != null)
                            <tr>
                                <td class="width30">{{ $order->size }}</td>
                            </tr>
                        @endif
                        @if ($order->general != null)
                            <tr>
                                <td class="width30">{{ $order->general }}</td>
                            </tr>
                        @endif
                        @if ($order->orderItems != null)
                        @foreach ($order->orderItems as $order_item)
                            
                        <tr>
                            <td class="width30">
                                <span>{{ ($lang == 'ar') ? 'اسم المنتج' : "Product Name" }} : </span>
                                {{ ($lang == 'ar') ? $order_item->product->name_ar : $order_item->product->name_en }} - 
                                <span>{{ ($lang == 'ar') ? 'وصف المنتج' : "Product Description" }} : </span>
                                {{ ($lang == 'ar') ? $order_item->product->description_ar : $order_item->product->description_en }} -  
                                <span>{{ ($lang == 'ar') ? 'الكمية المطلوبة' : "Quantity" }} : </span> {{ $order_item->quantity }}

                            </td>
                        </tr>
                        @endforeach
                    @endif

                    </thead>
                </table>
                @if ($order->status == 'pending')
                    <form action="{{ route('web.order.finish') }}" method="POST" enctype="multipart/form-data"
                        style="width:700px" class="profile-card rounded-lg shadow-xs bg-white p-15 p-md-30">
                        @csrf
                        <div
                            class="remv_control mr-2  d-flex  flex-column flex-md-row align-items-center justify-content-center">
                            <select name="status" class="mr-3 mt-3 form-control remv_focus" hidden>
                                <option value="2" {{ selected('2', request('status')) }}>{{ __('order.complete') }}
                                </option>
                            </select>
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <button type="submit" name="bulk_action_btn" value="update_status"
                                class="btn btn-primary mt-3 mr-2">
                                <i class="la la-refresh"></i> {{ __('order.complete') }}
                            </button>
                        </div>
                    </form>
                @endif
                <?php $rate = App\Models\Rating::where('order_id', $order->id)->first(); ?>
                @if ($order->status == 'complete' && empty($rate))
                    <div style="width:700px" class="profile-card rounded-lg shadow-xs bg-white p-15 p-md-30">
                        <div
                            class="remv_control mr-2  d-flex  flex-column flex-md-row align-items-center justify-content-center">
                            {{-- <select name="status" class="mr-3 mt-3 form-control remv_focus" hidden>
                             <option value="2" {{ selected('2', request('status')) }}>{{ __('order.add_rate') }}
                            </option>
                        </select>  --}}
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <a href="{{ route('web.add_rate' , $order->id) }}"   
                                class="btn btn-primary mt-3 mr-2">
                                <i class="la la-refresh"></i> {{ __('rate.add') }}
                            </a>
                        </div>
                    </div>
                @endif

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
