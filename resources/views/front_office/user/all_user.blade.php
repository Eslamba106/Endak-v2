@extends('layouts.home')
@section('title')
    <?php $lang = config('app.locale'); ?>
    {{ $lang == 'ar' ? 'مقدمين الخدمات' : 'Service Provider' }}
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
    <div class="page">

        <?php 
        // $current_url = url()->current();
        // $url = explode('/', $current_url);
        // $id = (int) end($url);
        // $department = App\Models\Department::where('id', $id)->first();
        // dd($department);
        $lang = config('app.locale');
        // dd($lang);
        ?>

        <div class="main-content app-content">
            <section>
                <div class="section banner-4 banner-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 text-center">
                                <div class="">
                                    <p class="mb-3 content-1 h5 text-white">{{ __('posts.projects') }} <span
                                            class="tx-info-dark">{{ __('page.page') }}</span></p>
                                    {{-- @if ($lang == 'ar')
                                        <p class="mb-0 tx-28">
                                            {{ __('department.department') }}
                                            {{ isset($department) ? ($lang == 'ar' ? $department->name_ar : $department->name_en) : '' }}
                                        </p>
                                    @else
                                        <p class="mb-0 tx-28">
                                            {{ isset($department) ? ($lang == 'ar' ? $department->name_ar : $department->name_en) : '' }}
                                            {{ __('department.department') }}
                                        </p>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                @forelse ($users as $user)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="position-relative">
                                                
                                                <a href="{{ route('web.profile' , $user->id ) }}">
                                                    <img class="card-img-top" src="{{ $user->image_url }}"
                                                        alt="img">
                                                </a> 
                                                {{-- <span class="badge bg-secondary blog-badge">{{ $user->add_order }}</span> --}}
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <h5><a href="{{ route('web.profile' , $user->id) }}">{{ $user->first_name .' ' .$user->last_name }}</a></h5>
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
                                                                    <i data-feather="star" width="20" height="20" class="active"></i>
                                                                @endwhile
                                                                @while ($i-- >= 0)
                                                                    <i data-feather="star" width="20" height="20" class=""></i>
                                                                @endwhile
                                                                <span class="badge badge-primary ml-10 bg-primary">{{ $rate }}</span>
                                    
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
                        {!! $users->links() !!}
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
                    </div>
                </div>
            </section>
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