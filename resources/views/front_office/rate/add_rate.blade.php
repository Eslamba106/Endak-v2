@extends('layouts.home')
@section('title')
    <?php $lang = config('app.locale'); ?>
    {{ $lang == 'ar' ? 'اضافة تقييم' : 'Add rate' }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('css/css-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('css/video-js.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    {{-- <style>
        .barrating-stars {
            border-right: 1px solid #f1f1f1;
        }

        .barrating-stars:last-child {
            border-right: none;
        }

        .br-theme-css-stars .br-widget {
            height: 28px;
            white-space: nowrap;
        }

        .br-theme-css-stars .br-widget a {
            text-decoration: none;
            height: 18px;
            width: 18px;
            float: left;
            font-size: 23px;
            margin-right: 5px;
        }

        .br-theme-css-stars .br-widget a:after {
            content: "\2605";
            color: #d2d2d2;
        }

        .br-theme-css-stars .br-widget a.br-active:after {
            color: #ffc600;
        }

        .br-theme-css-stars .br-widget a.br-selected:after {
            color: #ffc600;
        }

        .br-theme-css-stars .br-widget .br-current-rating {
            display: none;
        }

        .br-theme-css-stars .br-readonly a {
            cursor: default;
        }

        @media print {
            .br-theme-css-stars .br-widget a:after {
                content: "\2606";
                color: black;
            }

            .br-theme-css-stars .br-widget a.br-active:after,
            .br-theme-css-stars .br-widget a.br-selected:after {
                content: "\2605";
                color: black;
            }
        }

        /*
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
                    } */
    </style> --}}
@endsection
@section('content')
    <section class="profile-cover-container mt-40" style="height:800px;">
        <div class="profile-content pt-40">
            <div
                class="container position-relative d-flex  justify-content-center profile-card rounded-lg shadow-xs bg-white p-15 p-md-30  ">
              
                <form action="/web-rate/store" class="mt-20" method="post">
                    {{ csrf_field() }}
                    <h2 class="section-title after-line">{{ trans('rate.add_rate') }}
                        {{-- ({{ $course->reviews->pluck('creator_id')->count() }}) --}}
                       </h2>
   
                    <input type="hidden" name="order_id" value="{{ $order->id }}" />
                    {{-- <input type="hidden" name="user_id" value="{{ $order->id }}" /> --}}

                    <div class="form-group mt-5 mb-5">
                        <textarea name="comment" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="reviews-stars row align-items-center">

                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars mb-3">
                            <span class="font-14 text-gray">{{ trans('rate.professionalism_in_dealing') }}</span>
                            <select name="professionalism_in_dealing" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars mb-3">
                            <span class="font-14 text-gray">{{ trans('rate.communication_and_follow_up') }}</span>
                            <select name="communication_and_follow_up" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars mb-3">
                            <span class="font-14 text-gray">{{ trans('rate.quality_of_work_delivered') }}</span>
                            <select name="quality_of_work_delivered" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars mb-3">
                            <span class="font-14 text-gray">{{ trans('rate.experience_in_the_project_field') }}</span>
                            <select name="experience_in_the_project_field" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars mb-3">
                            <span class="font-14 text-gray">{{ trans('rate.delivery_on_time') }}</span>
                            <select name="delivery_on_time" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div
                            class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center barrating-stars mb-3">
                            <span class="font-14 text-gray">{{ trans('rate.deal_with_him_again') }}</span>
                            <select name="deal_with_him_again" data-rate="1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group mt-2"  style="text-align: right;margin-right:10px">
                            <button class="btn btn-primary mt-2" >{{ trans('rate.add_rate') }}</button>
                        </div>
                    {{-- <button type="submit" class="btn btn-sm btn-primary" style="margin: 30px">{{ trans('product.post_review') }}</button> --}}
                </form>

            </div>


        </div>


    </section>
    {{-- <section class="profile-cover-container"  >
`order_id`, `user_id`, `creator_id`,
 ``, ``, ``, `


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js"></script>

    <script src="{{ asset('js/webinar_show.min.js') }}"></script>
    <script src="{{ asset('js/feather-icons/dist/feather.min.js') }}"></script>
    <script>
        feather.replace();
    </script>
    <script>
        $('.barrating-stars select').each(function(index, element) {
            var $element = $(element);
            $element.barrating({
                theme: 'css-stars',
                readonly: false,
                initialRating: $element.data('rate')
            });
        });
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
