@extends('layouts.dashboard.dashboard')
@section('title')
    {{ __('products.product_show') }}
@endsection

@section('page_name')
    {{ __('products.product_show') }}
@endsection

@section('content')
<?php $lang = config('app.locale'); ?>



    <div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __("products.product_show") }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="width30">{{ __("department.name_ar") }}</td>
                                <td>{{ $Product->name_ar ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __("department.name_en") }}</td>
                                <td>{{ $Product->name_en ?? '#' }}</td>
                            </tr>
                            <tr>
                            <td class="width30">{{ __('department.description_en') }}</td>
                                <td>{{ $Product->description_en ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('department.description_ar') }}</td>
                                <td>{{ $Product->description_ar ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('category.categories') }}</td>
                                <td>
                                    
                                    @forelse ($Product->topics as $item)
                                        || {{ ($lang == "ar") ? $item->category_name_ar : $item->category_name_en }} || 
                                    @empty
                                        
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __("department.image") }}</td>
                                <td>
                                <div class="image" >
                                    <img width="100" height="100" src="{{ $Product->image_url ?? "" }}" alt="Not" class="custom_img">
                                    
                                </div>
                            </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
