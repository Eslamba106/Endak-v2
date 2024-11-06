@extends('layouts.home')
@section('title')
    <?php $lang = config('app.locale'); ?>
    {{ $lang == 'ar' ? 'المشاريع' : 'Projects' }}
@endsection
@section('content')
    <div class="page">

        <?php $current_url = url()->current();
        $url = explode('/', $current_url);
        $id = (int) end($url);
        $department = App\Models\Department::where('id', $id)->first();
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
                                    @if ($lang == 'ar')
                                        <p class="mb-0 tx-28">
                                            {{ __('department.department') }}
                                            {{ isset($department) ? ($lang == 'ar' ? $department->name_ar : $department->name_en) : '' }}
                                        </p>
                                    @else
                                        <p class="mb-0 tx-28">
                                            {{ isset($department) ? ($lang == 'ar' ? $department->name_ar : $department->name_en) : '' }}
                                            {{ __('department.department') }}
                                        </p>
                                    @endif
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
                                @forelse ($posts as $post)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="position-relative">

                                                {{-- <a href="">
                                                    <img class="card-img-top" src="../assets/images/blog/3.jpg"
                                                        alt="img">
                                                </a> --}}
                                                <span class="badge bg-secondary blog-badge">{{ $post->add_order }}</span>
                                            </div>

                                            <div class="card-body d-flex flex-column">

                                                    <h5><a
                                                            href="{{ route('web.posts.show', $post->id) }}">{{ $post->title }}</a>
                                                    </h5>
                                                    <div class="tx-muted">{{ $post->description }}</div>
                                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                                        <a href="{{ route('web.posts.show', $post->id) }}">

                                                        <div class="avatar me-3 cover-image rounded-circle">
                                                            <img src="{{ $post->user->image ?? asset('images/user.png') }}"
                                                                class="rounded-circle" alt="img" width="40">
                                                        </div>
                                                    </a>

                                                        <div>
                                                            <a href="javascript:void(0);"
                                                                class="h6">{{ $post->user->first_name . ' ' . $post->user->last_name }}</a>
                                                            <small
                                                                class="d-block tx-muted">{{ $post->created_at->shortAbsoluteDiffForHumans() }}</small>
                                                        </div>
                                                    </div>

                                            </div>

                                        </div>
                                    </div>
                                @empty
                                    {!! no_data() !!}
                                @endforelse

                            </div>

                        </div>
                        {!! $posts->links() !!}
                        <!-- COL-END -->
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('web.posts.create', $id) }}"
                                        class="custom-form-btn btn btn-lg btn-primary bg-primary-gradient rounded-pill border-0"
                                        type="button" id="btn-addon">{{ __('posts.add_post') }}</a>

                                </div>
                            </div>
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
