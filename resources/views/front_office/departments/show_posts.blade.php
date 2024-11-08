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
                                {{-- <p class="mb-0 tx-28">We Fight Passionately to Get Our Clients Every Time They Deserve</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        @if ($posts->count())
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                        <section class="section">
                            <div class="container">
                                <div class="row">
                                    @if ($posts)
                                        <div class="col-xl-8">
                                            <div class="row">
                                                @forelse ($posts as $post)
                                              
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
                                                                    <div class="avatar me-3 cover-image rounded-circle">
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
                               



                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </section>
        @endif
        @if($products->count())

        <form action="" method="get">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="section">
                                <div class="container">
                                    <div class="heading-section">
                                        <div class="heading-subtitle"><span
                                                class="tx-primary tx-16 fw-semibold">{{ __('products.products') }}</span>
                                        </div>
                                        <div class="heading-title">{{ __('products.products') }}</div>
                                        <div class="heading-description"> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="row">
                                                @forelse ($products as $item)
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            @if ($item->image)
                                                                <div class="position-relative">
                                                                    <a href="">
                                                                        <img class="card-img-top"
                                                                            src="{{ $item->image_url }}" alt="img">
                                                                    </a>
                                                                    {{-- <span class="badge bg-secondary blog-badge"></span> --}}
                                                                </div>
                                                            @endif
                                                            <div class="card-body d-flex flex-column">
                                                                <h5><a
                                                                        href="">{{ $lang == 'ar' ? $item->name_ar : $item->name_en }}</a>
                                                                </h5>
                                                              
                                                                <div class="tx-muted">
                                                                    {{ $lang == 'ar' ? $item->description_ar : $item->description_en }}
                                                                </div>
                                                                <div class="d-flex align-items-center pt-4 mt-auto">
                                                                    {{-- <div class="avatar me-3 cover-image rounded-circle">
                                                                        <img src="../assets/images/profile/1.jpg"
                                                                            class="rounded-circle" alt="img"
                                                                            width="40">
                                                                    </div> --}}
                                                                   
                                                                        
                                                                    
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <small class="tx-muted">{{ $item->created_at->diffForHumans() }}</small>
                                                                        @if (auth()->check())
                                                                        <a class="dropdown-item ms-auto "  href="{{ route('web.send_message', $item->owner) }}">
                                                                            <i class="fe fe-mail mx-1"></i> {{ __('messages.send_message') }}
                                                                        </a>
                                                                        @endif
                                                                    </div>
                                                                  
                                                                    
                                                                    
                                                                    {{-- <div class="ms-auto">
                                                                        <a href="javascript:void(0)"
                                                                            class="icon d-inline-block tx-muted">
                                                                            <i
                                                                                class="fe fe-heart me-1 rounded-circle p-2 bg-gray-200 tx-muted"></i>
                                                                        </a>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    {!! no_data() !!}
                                                @endforelse

                                                {{-- {!! $products->links() !!} --}}
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="h5 mb-4">Tags</p>
                                                    <div class="tags">

                                                        @foreach ($categories as $category)
                                                            {{-- <div> --}}
                                                            <div class="tag">
                                                                <input type="checkbox" name="category[]"
                                                                    value="{{ $category->id }}"
                                                                    {{ in_array('category', request('category', [])) ? 'checked' : '' }}>
                                                                <label for="category-{{ $category->id }}">
                                                                    {{ $lang == 'ar' ? $category->category_name_ar : $category->category_name_en }}
                                                                </label>
                                                            </div>

                                                            {{-- </div> --}}
                                                        @endforeach
                                                    </div>
                                                    <button type="submit" name="bulk_action_btn" value="filter"
                                                        class="btn btn-primary mt-3 mr-2">
                                                        <i class="la la-refresh"></i>{{ __('products.filter') }}
                                                    </button>
                                                </div>
                                            </div>
                                            @if (auth()->check())
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="m-2 d-inline">
                                                            <a href="#"
                                                                class="btn btn-sm btn-outline-primary mr-2 mb-4"
                                                                data-category_id="" data-toggle="modal"
                                                                data-target="#category_id">{{ __('order.add_order') }}</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                            @if (auth()->check())
                                            {{-- <div class="col-xl-4"> --}}
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ route('web.posts.create', $id) }}"
                                                            class="custom-form-btn btn btn-lg btn-primary bg-primary-gradient rounded-pill border-0"
                                                            type="button" id="btn-addon">{{ __('posts.add_post') }}</a>
                                    
                                                    </div>
                                                </div>
                                    
                                    
                                            {{-- </div> --}}
                                        @endif
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>




                    </div>
                </div>
            </section>
        </form>
        @endif
        @if($posts->count() == 0 && $products->count() == 0)
        <section class="section">
            <div class="container">
               
                <div class="row">
                    <div class="col-xl-12">
                        <section class="section">
                            <div class="container">
                                
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="row">
                                             
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                      
                                        @if (auth()->check())
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="{{ route('web.posts.create', $id) }}"
                                                        class="custom-form-btn btn btn-lg btn-primary bg-primary-gradient rounded-pill border-0"
                                                        type="button" id="btn-addon">{{ __('posts.add_post') }}</a>
                                
                                                </div>
                                            </div>
                                
                                
                                    @endif
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>




                </div>
            </div>
        </section>
        @endif
    @endsection
