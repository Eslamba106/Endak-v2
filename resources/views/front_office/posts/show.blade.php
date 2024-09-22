@extends('layouts.home')
@section('title')
    <?php $lang = config('app.locale'); ?>
    {{ $lang == 'ar' ? 'المشاريع' : 'Projects' }}
@endsection
@section('content')
    <div class="main-content app-content">
        <section>
            <div class="section banner-4 banner-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="">
                                <p class="mb-3 content-1 h5 text-white">Blog <span class="tx-info-dark">Description</span></p>
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
                    <div class="col-xl-8">
                        <div class="card">
                            @if ($post->image_url != null)
                                <img class="card-img-top" src="{{ $post->image_url }}" alt="img">
                            @endif
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <div class="d-flex me-4 mb-3 mb-md-0 align-items-center">
                                        @if ($post->user->image != null)
                                            <img class="avatar rounded-circle me-3" src="{{ $post->user->image_url }}"
                                                alt="avatar-img">
                                        @endif
                                        <div class="pe-3">
                                            <h6 class="mb-0">Author Name</h6>
                                            <p class="tx-muted tx-15 fw-500 mb-0">{{ $post->user->first_name }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex me-4 mb-3 mb-md-0 align-items-center">
                                        <span class="avatar bg-gray-200 rounded-circle tx-muted border me-3"><i
                                                class="fe fe-grid"></i></span>
                                        <div class="pe-3">
                                            <h6 class="mb-0">Categories</h6>
                                            <p class="tx-muted tx-15 fw-500 mb-0">{{ $post->department->name_en }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex me-4 mb-3 mb-md-0 align-items-center">
                                        <span class="avatar bg-gray-200 rounded-circle tx-muted border me-3"><i
                                                class="fe fe-calendar"></i></span>
                                        <div class="pe-3">
                                            <h6 class="mb-0">Date</h6>
                                            <p class="tx-muted tx-15 fw-500 mb-0">
                                                {{ $post->created_at->shortAbsoluteDiffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-3">
                                <h4>{{ $post->title }}</h4>
                                <p class="card-text">{{ $post->description }}</p>
                                <p> {{ $post->notes }}
                                </p>
                                <p>
                                    {{ $post->price }} $
                                </p>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body pb-0">
                                <h5 class="mb-4">Comments</h5>
                                <div class="d-block mb-4 overflow-visible d-block d-sm-flex">
                                    <div class="me-3 mb-3">
                                        {{-- <a href="javascript:void(0);"> <img class="avatar avatar-lg rounded-circle thumb-sm"
                                                alt="64x64" src="../assets/images/profile/2.jpg"> </a> --}}
                                    </div>
                                    @forelse ($post->comments as $comment)
                                        <div class="overflow-visible">
                                            <div class="border mb-4 p-4 br-5">
                                                {{-- <nav class="nav float-end">
                                                    <div class="dropdown">
                                                        <a class="nav-link tx-muted fs-16 p-0 ps-4" href="javascript:;"
                                                            data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                                            aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fe fe-edit mx-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fe fe-corner-up-left mx-1"></i> Reply</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fe fe-flag mx-1"></i> Report Abuse</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fe fe-trash-2 mx-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </nav> --}}
                                                <h5 class="mt-0">
                                                    {{ $comment->user->first_name . ' ' . $comment->user->last_name }}</h5>
                                                <p class="tx-muted"> {{ $comment->description }}</p>

                                                <a href="javascript:void(0);"
                                                    class="btn btn-primary-transparent btn-sm rounded-pill" role="button"
                                                    data-bs-toggle="reply-form" data-bs-target="comment-1">
                                                    <i class="fe fe-corner-up-left me-2"></i>Accept Offer
                                                </a>

                                                <form method="POST" class="reply-form d-none" id="comment-1">
                                                    <textarea placeholder="Reply to Comment..." class="form-control my-3" rows="3"></textarea>
                                                    <div class="text-end">
                                                        <button type="button"
                                                            class="btn btn-success-transparent btn-sm rounded-pill">Submit</button>
                                                        <button type="button"
                                                            class="btn btn-danger-transparent btn-sm rounded-pill"
                                                            data-bs-toggle="reply-form"
                                                            data-bs-target="comment-1">Cancel</button>
                                                    </div>
                                                </form>

                                            </div>
                                            {{-- <div class="d-block d-sm-flex overflow-visible">
                                                <div class="me-3 mb-3">
                                                    <a href="javascript:void(0);"> <img
                                                            class="avatar avatar-lg rounded-circle thumb-sm" alt="64x64"
                                                            src="{{ $comment->user->image_url }}"> </a>
                                                </div>

                                            </div> --}}
                                        </div>

                                        @empty
                                            {!! no_data() !!}
                                    @endforelse
                                </div>
                            </div>
                        </div>



                        {{-- Comments --}}
                        <div class="card">
                            <div class="card-body">
                                <p class="h5 mb-4">Add a Comments</p>
                                <form class="form-horizontal  m-t-20" action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $post->department_id }}" name="department_id">
                                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                            <textarea class="form-control" rows="5" placeholder="Your Comment" name="description"></textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <div class="col-xs-12">
                                            <textarea class="form-control" rows="5" placeholder="Your Notes" name="notes"></textarea>
                                        </div>
                                    </div> --}}
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        {{-- <a href="javascript:void(0)" class="btn btn-primary">Submit</a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-4"> --}}
                    {{-- <div class="card">
                        <div class="card-body">
                            <form action="javascript:void(0);" class="form">
                                <div class="form-group custom-form-group">
                                    <input type="search" class="form-control form-control-lg rounded-pill" placeholder="Find your Blog here...">
                                    <button class="custom-form-btn btn btn-lg btn-primary bg-primary-gradient rounded-pill border-0" type="button" id="btn-addon">Search</button>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                    {{-- <div class="card">
                        <div class="card-body">
                            <p class="h5 mb-4">Categories</p>
                            <ul class="list-group">
                                <li class="list-group-item border-0 px-0"><a href="javascript:void(0)" class="tx-primary"><i class="fe fe-chevron-right me-1"></i>Web Hosting</a> <span class="product-label tx-primary bg-primary-01">22</span> </li>
                                <li class="list-group-item border-0 px-0"><a href="javascript:void(0)"><i class="fe fe-chevron-right me-1"></i>Dedicated Servers</a> <span class="product-label">15</span> </li>
                                <li class="list-group-item border-0 px-0"><a href="javascript:void(0)"><i class="fe fe-chevron-right me-1"></i>Linux Servers</a> <span class="product-label">10</span> </li>
                                <li class="list-group-item border-0 px-0"><a href="javascript:void(0)"><i class="fe fe-chevron-right me-1"></i>Email Hosting</a> <span class="product-label">88</span> </li>
                                <li class="list-group-item border-0 px-0"><a href="javascript:void(0)"><i class="fe fe-chevron-right me-1"></i>SSL Certificate</a> <span class="product-label">43</span> </li>
                                <li class="list-group-item border-0 px-0"><a href="javascript:void(0)"><i class="fe fe-chevron-right me-1"></i>Codeguard Backup</a> <span class="product-label">76</span> </li>
                                <li class="list-group-item border-0 px-0"><a href="javascript:void(0)"><i class="fe fe-chevron-right me-1"></i>Sitelock</a> <span class="product-label">97</span> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <p class="h5 mb-4">Professional Blog Writers</p>
                            <div class="">
                                <div class="d-flex overflow-visible">
                                    <img class="avatar rounded-circle avatar-lg me-3" src="../assets/images/profile/2.jpg" alt="avatar-img">
                                    <div class="">
                                        <a href="blog-details.html" class="fw-600">Simon Sais</a>
                                        <p class="tx-muted mb-0">There are many variations of passages of Lorem Ipsum available ...</p>
                                    </div>
                                </div>
                                <div class="d-flex overflow-visible mt-4">
                                    <img class="avatar rounded-circle avatar-lg me-3" src="../assets/images/profile/3.jpg" alt="avatar-img">
                                    <div class="">
                                        <a href="blog-details.html" class="fw-600">Cherry Blossom</a>
                                        <p class="tx-muted mb-0">There are many variations of passages of Lorem Ipsum available ...</p>
                                    </div>
                                </div>
                                <div class="d-flex overflow-visible mt-4">
                                    <img class="avatar rounded-circle avatar-lg me-3" src="../assets/images/profile/4.jpg" alt="avatar-img">
                                    <div class="">
                                        <a href="blog-details.html" class="fw-600">Ivan Notheridiya</a>
                                        <p class="tx-muted mb-0">There are many variations of passages of Lorem Ipsum available ...</p>
                                    </div>
                                </div>
                                <div class="d-flex overflow-visible mt-4">
                                    <img class="avatar rounded-circle avatar-lg me-3" src="../assets/images/profile/5.jpg" alt="avatar-img">
                                    <div class="">
                                        <a href="blog-details.html" class="fw-600">Manny Jah</a>
                                        <p class="tx-muted mb-0">There are many variations of passages of Lorem Ipsum available ...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- 
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <p class="h5 mb-4">Recent Posts</p>
                                <div class="row mb-3 mb-xl-0">
                                    <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 text-center">
                                        <img src="../assets/images/blog/6.jpg" class="img-fluid br-5 w-100" width="120" alt="img">
                                    </div>
                                    <div class="col-xl-8 col-lg-9 col-md-8 col-sm-8">
                                        <span class="badge bg-danger-transparent tx-danger me-1 mb-1 mt-3 mt-sm-0">Cloud</span>
                                        <h6 class="mb-0"><a href="blog-details.html"> Voluptatem quia voluptas </a></h6>
                                        <p class="tx-muted">Excepteur sint occaecat....</p>
                                    </div>
                                </div>
                                <div class="row mb-3 mb-xl-0">
                                    <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 text-center">
                                        <img src="../assets/images/blog/5.jpg" class="img-fluid br-5 w-100" width="120" alt="img">
                                    </div>
                                    <div class="col-xl-8 col-lg-9 col-md-8 col-sm-8">
                                        <span class="badge bg-primary-transparent tx-primary me-1 mb-1 mt-3 mt-sm-0">Hosting</span>
                                        <h6 class="mb-0"><a href="blog-details.html"> Voluptatem quia voluptas </a></h6>
                                        <p class="tx-muted">Excepteur sint occaecat....</p>
                                    </div>
                                </div>
                                <div class="row mb-3 mb-xl-0">
                                    <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 text-center">
                                        <img src="../assets/images/blog/2.jpg" class="img-fluid br-5 w-100" width="120" alt="img">
                                    </div>
                                    <div class="col-xl-8 col-lg-9 col-md-8 col-sm-8">
                                        <span class="badge bg-secondary-transparent tx-secondary me-1 mb-1 mt-3 mt-sm-0">Email</span>
                                        <h6 class="mb-0"><a href="blog-details.html"> Voluptatem quia voluptas </a></h6>
                                        <p class="tx-muted">Excepteur sint occaecat....</p>
                                    </div>
                                </div>
                                <div class="row mb-3 mb-xl-0">
                                    <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 text-center">
                                        <img src="../assets/images/blog/3.jpg" class="img-fluid br-5 w-100" width="120" alt="img">
                                    </div>
                                    <div class="col-xl-8 col-lg-9 col-md-8 col-sm-8">
                                        <span class="badge bg-success-transparent tx-success me-1 mb-1 mt-3 mt-sm-0">Servers</span>
                                        <h6 class="mb-0"><a href="blog-details.html"> Voluptatem quia voluptas </a></h6>
                                        <p class="tx-muted mb-0">Excepteur sint occaecat....</p>
                                    </div>
                                </div>
                            </div>
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
                    </div>

                    <div class="card bg-primary-transparent feature-card-14 overflow-hidden">
                        <div class="card-body">
                            <h5 class="fw-semibold text-white">NEVER MISS A POST !</h5>
                            <P class="text-white">Signup for free to get the latest posts.</P>
                            <div class="input-group">
                                <input class="form-control border-0" placeholder="Enter your email id" type="text">
                                <a href="javascript:void(0)" class="btn btn-info-dark">Subscribe<i class="fa fa-paper-plane ms-2 tx-11"></i></a>
                            </div>
                        </div>
                    </div> --}}

                    {{-- </div> --}}
                </div>
            </div>
        </section>
    </div>
@endsection
