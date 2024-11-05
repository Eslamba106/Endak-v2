@extends('layouts.home')

@section('content')
<?php $lang = config('app.locale'); ?>
    <h1>نتائج البحث عن: "{{ $query }}"</h1>

    @if($departments->isEmpty())
    @else
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
                        <a href="{{ route('departments.show', $department->id) }}" class="text-decoration-none">
                            <div class="card border feature-card-15 mb-xl-0 position-relative"
                                style="width: 100%; height: 200px;">
                                @if ($department->image)
                                    <img src="{{ $department->image_url }}" class="card-img-top"
                                        alt="{{ $department->name_en }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-primary d-flex align-items-center justify-content-center"
                                        style="height: 100%; width: 100%;">
                                        <i class="bi bi-gem tx-22 text-white"></i>
                                    </div>
                                @endif
                                <!-- اسم القسم في منتصف الصورة -->
                                <div class="position-absolute top-50 start-50 translate-middle text-center text-white"
                                    style="width: 100%;  padding: 10px; z-index: 100;">
                                    <h5 class="mb-0">{{ $lang == 'ar' ? $department->name_ar : $department->name_en }}
                                    </h5>
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
    @endif
    @if($users->isEmpty())
     
    @else
    <section class="section">
        <div class="container">
            <div class="heading-section">
                <div class="heading-subtitle"><span
                        class="tx-primary tx-16 fw-semibold">{{ __('user.providers') }}</span>
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
                    </div>
                </div>
            </div>
    </section>
    @endif

@endsection
