@extends('layouts.home')
@section('title')
    <?php $lang = config('app.locale'); ?>
    {{ $lang == 'ar' ? 'المنشورات' : 'Posts' }}
@endsection
@section('content')
<?php $current_url = url()->current();
$url = explode('/', $current_url);
$id = (int) end($url);
$department = App\Models\Department::where('id', $id)->first();
// $lang = config('app.locale');
?>
    <div class="main-content app-content">
        <section>
            <div class="section banner-4 banner-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="">
                                <p class="mb-3 content-1 h5 text-white">{{ __('general.add') }} <span class="tx-info-dark">{{ __('order.order') }}</span></p>
                                {{-- <p class="mb-0 tx-28">We Fight Passionately to Get Our Clients Every Time They Deserve</p> --}}
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
                            <div class="card-body">
                                <p class="h5 mb-4">{{ __('order.add_order') }}</p>
                                <form class="form-horizontal  m-t-20" action="" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                            <label for="title">{{ __('general.title') }}</label>
                                            <input class="form-control" type="text" name="title" 
                                                placeholder="{{ __('general.title') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="days_count"></label>
                                            <input class="form-control" type="text" name="days_count"
                                                placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="price">{{ __('posts.price') }}</label>
                                            <input class="form-control" type="text" name="price"
                                                placeholder="{{ __('posts.price') }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="city">{{ __('posts.city') }}</label>
                                            <input class="form-control" type="text" name="city"
                                                placeholder="{{ __('posts.city') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="neighborhood">{{ __('posts.neighborhood') }}</label>
                                            <input class="form-control" type="text" name="neighborhood"
                                                placeholder="{{ __('posts.neighborhood') }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="from_city">{{ __('posts.from_city') }}</label>
                                            <input class="form-control" type="text" name="from_city"
                                                placeholder="{{ __('posts.from_city') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="from_neighborhood">{{ __('posts.from_neighborhood') }}</label>
                                            <input class="form-control" type="text" name="from_neighborhood"
                                                placeholder="{{ __('posts.from_neighborhood') }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="from_floor">{{ __('posts.from_floor') }}</label>
                                            <input class="form-control" type="text" name="from_floor"
                                                placeholder="{{ __('posts.from_floor') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="from_house">{{ __('posts.from_house') }}</label>
                                            <input class="form-control" type="text" name="from_house"
                                                placeholder="{{ __('posts.from_house') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="from_city">{{ __('posts.to_city') }}</label>
                                            <input class="form-control" type="text" name="to_city"
                                                placeholder="{{ __('posts.to_city') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="to_neighborhood">{{ __('posts.to_neighborhood') }}</label>
                                            <input class="form-control" type="text" name="to_neighborhood"
                                                placeholder="{{ __('posts.to_neighborhood') }}">
                                        </div>
                                    </div>
                      
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="to_floor">{{ __('posts.to_floor') }}</label>
                                            <input class="form-control" type="text" name="to_floor"
                                                placeholder="{{ __('posts.to_floor') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="to_house">{{ __('posts.to_house') }}</label>
                                            <input class="form-control" type="text" name="to_house"
                                                placeholder="{{ __('posts.to_house') }}">
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="exampleInputEmail1"></label>
                                            <input class="form-control" type="text" name="days_count"
                                                placeholder="{{ __('posts.days_count') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="exampleInputEmail1"></label>
                                            <input class="form-control" type="text" name=""
                                                placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="exampleInputEmail1"></label>
                                            <input class="form-control" type="text" name=""
                                                placeholder="Username">
                                        </div>
                                    </div>
                                   
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="exampleInputEmail1"></label>
                                            <textarea class="form-control" rows="5" placeholder="{{ __('Simple Descriptoin') }}" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="exampleInputEmail1"></label>
                                            <textarea class="form-control" rows="5" placeholder="Your Notes" name="notes"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="image">{{ __('general.image') }}</label>
                                            <input class="form-control" type="file" name="image"
                                                placeholder="{{ __('general.image') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-xs-12">
                                                <label for="image">{{ __('general.image') }}</label>
                                            <input class="form-control" type="file" name="image"
                                                placeholder="{{ __('general.image') }}">
                                        </div>
                                    </div>


                                    <div class="">
                                        <a href="javascript:void(0)" class="btn btn-primary">Submit</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
