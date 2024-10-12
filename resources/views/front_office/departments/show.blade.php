@extends('layouts.home')
@section('title')
    {{ __('department.departments') }}
@endsection

@section('content')
    <?php
    $lang = config('app.locale');
    $current_url = url()->current();
    $url = explode('/', $current_url);
    $id = (int) end($url);
    $main_department = App\Models\Department::where('id', $id)->first();
    
    ?>
    <div class="main-content app-content">
        <section>
            <div class="section banner-4 banner-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="">
                                <p class="mb-3 content-1 h5 text-white">{{ __('department.departments') }} <span
                                        class="tx-info-dark">{{ __('general.center') }}</span></p>
                                <p class="mb-0 tx-28">We Fight Passionately to Get Our Clients Every Time They Deserve</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        @if (isset($departments) && $departments[0] != null)

                            <div class="row">
                                @forelse ($departments as $department)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="position-relative">
                                                <a href="{{ route('web.posts', $department->id) }}">
                                                    <img class="card-img-top" src="{{ $department->image_url }}"
                                                        alt="img" width="300" height="300">
                                                </a>
                                                {{-- <span class="badge bg-success blog-badge">{{ $department->name }}</span> --}}
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <h5><a href="">
                                                        {{ $lang == 'ar' ? $department->name_ar : $department->name_en }}</a>
                                                </h5>
                                                <div class="tx-muted">
                                                    {{ $lang == 'ar' ? $department->description_ar : $department->description_en }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    {!! no_data() !!}
                                @endforelse
                            </div>

                            {!! $departments->links() !!}
                        @else
                            {{-- if(isset($departments) && $main_department->posts ) --}}
                            <div class="main-content app-content">
                                {{-- <section>
                                <div class="section banner-4 banner-section">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-md-12 text-center">
                                                <div class="">
                                                    <p class="mb-3 content-1 h5 text-white">{{ __('posts.projects') }} <span
                                                            class="tx-info-dark">{{ __('page.page') }}</span></p>
                                                    @if ($lang == 'ar')
                                                        <p class="mb-0 tx-28">
                                                            {{ __('department.department') }}
                                                            {{ isset($main_department) ? ($lang == 'ar' ? $main_department->name_ar : $main_department->name_en) : '' }}
                                                        </p>
                                                    @else
                                                        <p class="mb-0 tx-28">
                                                            {{ isset($main_department) ? ($lang == 'ar' ? $main_department->name_ar : $main_department->name_en) : '' }}
                                                            {{ __('department.department') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </section> --}}

                                <section class="section">
                                    <div class="container">
                                        <div class="row">
                                            {{-- {{ $main_department->posts }} --}}
                                            @if ($main_department->posts)
                                                <div class="col-xl-8">
                                                    <div class="row">
                                                        @forelse ($main_department->posts as $post)
                                                            <div class="col-md-6">
                                                                <div class="card">
                                                                    <div class="position-relative">


                                                                        <span
                                                                            class="badge bg-secondary blog-badge">{{ $post->add_order }}</span>
                                                                    </div>
                                                                    <div class="card-body d-flex flex-column">
                                                                        <h5><a
                                                                                href="{{ route('web.posts.show', $post->id) }}">{{ $post->title }}</a>
                                                                        </h5>
                                                                        <div class="tx-muted">{{ $post->description }}
                                                                        </div>
                                                                        <div class="d-flex align-items-center pt-4 mt-auto">
                                                                            <div
                                                                                class="avatar me-3 cover-image rounded-circle">
                                                                                <img src="{{ $post->user->image ?? asset('images/user.png') }}"
                                                                                    class="rounded-circle" alt="img"
                                                                                    width="40">
                                                                            </div>
                                                                            <div>
                                                                                <a href="javascript:void(0);"
                                                                                    class="h6">{{ $post->user->first_name . ' ' . $post->user->last_name }}</a>
                                                                                <small
                                                                                    class="d-block tx-muted">{{ $post->created_at->shortAbsoluteDiffForHumans() }}</small>
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
                                                {{-- {!! $main_department->posts->paginate(2)->links() !!} --}}
                                            @endif
                                            <!-- COL-END -->
                                            <div class="col-xl-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('web.posts.create', $id) }}"
                                                            class="custom-form-btn btn btn-lg btn-primary bg-primary-gradient rounded-pill border-0"
                                                            type="button" id="btn-addon">{{ __('posts.add_post') }}</a>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        @endif


                    </div>
                </div>
        </section>




    </div>
@endsection
