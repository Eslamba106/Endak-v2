@extends('layouts.home')
@section('title')
    {{ __('department.departments') }}
@endsection

@section('content')
<?php     
$lang = config('app.locale');
?>
    <div class="main-content app-content">
        <section>
            <div class="section banner-4 banner-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="">
                                <p class="mb-3 content-1 h5 text-white">{{ __('department.departments') }} <span class="tx-info-dark">{{ __('general.center') }}</span></p>
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
                        <div class="row">
                            @forelse ($departments as $department)
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="position-relative">
                                            <a href="{{ route('web.posts' , $department->id) }}">
                                                <img class="card-img-top" src="{{ $department->image_url }}" alt="img" width="300" height="300">
                                            </a>
                                            {{-- <span class="badge bg-success blog-badge">{{ $department->name }}</span> --}}
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h5><a href=""> {{ ($lang == 'ar') ? $department->name_ar : $department->name_en }}</a></h5>
                                            <div class="tx-muted">{{ ($lang == 'ar') ?  $department->description_ar : $department->description_en  }}</div>
                                      
                                        </div>
                                    </div>
                                </div>

                            @empty
                                {!! no_data() !!}
                            @endforelse
                        </div>
                        {!! $departments->links() !!}

                        <!-- COL-END -->
                        {{-- <div class="mb-9">
                        <div class="float-end">
                            <ul class="pagination ">
                                <li class="page-item page-prev disabled">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                                <li class="page-item page-next">
                                    <a class="page-link" href="javascript:void(0)">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                        <!-- COL-END -->

                    </div>
                </div>
        </section>




    </div>
@endsection
