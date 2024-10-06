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
        .reviews-stars .barrating-stars {
            border-right: 1px solid #f1f1f1;
        }

        .reviews-stars .barrating-stars:last-child {
            border-right: none;
        }

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

                <form action="/reviews/store" class="mt-20" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="webinar_id" value="{{ $order->id }}" />

                    <div class="form-group">
                        <textarea name="description" class="form-control" rows="10"></textarea>
                    </div>

                    <div class="reviews-stars row align-items-center">

                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars">
                            <span class="font-14 text-gray">{{ trans('product.content_quality') }}</span>
                            <select name="content_quality" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars">
                            <span class="font-14 text-gray">{{ trans('product.instructor_skills') }}</span>
                            <select name="instructor_skills" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars">
                            <span class="font-14 text-gray">{{ trans('product.purchase_worth') }}</span>
                            <select name="purchase_worth" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars">
                            <span class="font-14 text-gray">{{ trans('product.support_quality') }}</span>
                            <select name="support_quality" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary mt-20">{{ trans('product.post_review') }}</button>
                </form>

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
@section('script')
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/webinar_show.min.js') }}"></script>
    <script src="{{ asset('js/feather-icons/dist/feather.min.js') }}"></script>
    <script>
        feather.replace();
    </script>
    {{-- <script>
        (function($) {
            "use strict";

            $('body').on('click', '.js-show-review-details', function(e) {
                e.preventDefault();
                var $this = $(this);
                var parent = $this.closest('td');
                var items = ['content_quality', 'instructor_skills', 'purchase_worth', 'support_quality'];
                var $modal = $('#reviewRateDetail');

                for (var _i = 0, _items = items; _i < _items.length; _i++) {
                    var item = _items[_i];
                    var value = parent.find('.js-' + item).val();
                    $modal.find('.js-' + item).text(value);
                }

                $modal.modal('show');
            });
            $('body').on('click', '.js-show-product-review-details', function(e) {
                e.preventDefault();
                var $this = $(this);
                var parent = $this.closest('td');
                var items = ['product_quality', 'purchase_worth', 'delivery_quality', 'seller_quality'];
                var $modal = $('#reviewRateDetail');

                for (var _i2 = 0, _items2 = items; _i2 < _items2.length; _i2++) {
                    var item = _items2[_i2];
                    var value = parent.find('.js-' + item).val();
                    $modal.find('.js-' + item).text(value);
                }

                $modal.modal('show');
            });
            $('body').on('click', '.js-show-description', function(e) {
                e.preventDefault();
                var message = $(this).parent().find('input[type="hidden"]').val();
                var $modal = $('#contactMessage');
                $modal.find('.modal-body').html(message);
                $modal.modal('show');
            });
        })(jQuery);
    </script>
    <script>
        (function($) {
            "use strict";

            $('body').on('click', '.js-show-review-details', function(e) {
                e.preventDefault();

                const $this = $(this);
                const parent = $this.closest('td');
                const items = ['content_quality', 'instructor_skills', 'purchase_worth', 'support_quality'];
                const $modal = $('#reviewRateDetail');

                for (let item of items) {
                    const value = parent.find('.js-' + item).val();
                    $modal.find('.js-' + item).text(value);
                }

                $modal.modal('show');
            });

            $('body').on('click', '.js-show-product-review-details', function(e) {
                e.preventDefault();

                const $this = $(this);
                const parent = $this.closest('td');
                const items = ['product_quality', 'purchase_worth', 'delivery_quality', 'seller_quality'];
                const $modal = $('#reviewRateDetail');

                for (let item of items) {
                    const value = parent.find('.js-' + item).val();
                    $modal.find('.js-' + item).text(value);
                }

                $modal.modal('show');
            });

            $('body').on('click', '.js-show-description', function(e) {
                e.preventDefault();

                const message = $(this).parent().find('input[type="hidden"]').val();

                const $modal = $('#contactMessage');
                $modal.find('.modal-body').html(message);

                $modal.modal('show');
            })
        })(jQuery);
    </script> --}}
@endsection
