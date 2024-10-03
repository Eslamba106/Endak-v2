@extends('layouts.dashboard.dashboard')
@section('title')
{{ __('products.products') }}
@endsection

@section('page_name')
{{ __('products.create_product') }}
@endsection

{{-- @section('page-header-right')
    <a href="{{route('pages')}}" class="btn btn-info" data-toggle="tooltip" title="{{ __('pages') }}"> <i class="la la-list"></i> {{ __('pages')}} </a>
@endsection --}}


@section('content')

    {{-- <div class="row"> --}}
        <div class="col-sm-12">

            <form action="{{ route('admin.products.store') }}" method="post" id="createPostForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group row {{ $errors->has('name_ar') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="department_name">@lang('department.name_ar') <em>*</em></label>
                    <div class="col-sm-7">
                        <input type="text" name="name_ar" value="" placeholder="@lang('department.name_ar')"
                            class="form-control">
                        {!! $errors->has('name_ar') ? '<p class="help-block">' . $errors->first('name_ar') . '</p>' : '' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('name_en') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="department_name_en">@lang('department.name_en') <em>*</em></label>
                    <div class="col-sm-7">
                        <input type="text" name="name_en" value="" placeholder="@lang('department.name_en')"
                             class="form-control">
                        {!! $errors->has('name_en') ? '<p class="help-block">' . $errors->first('name_en') . '</p>' : '' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description_ar') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="description_ar">@lang('department.description_ar') </label>
                    <div class="col-sm-7">
                        <textarea name="description_ar" placeholder="@lang('department.description_ar')" id="description_ar" class="form-control"></textarea>
                        {!! $errors->has('description_ar') ? '<p class="help-block">' . $errors->first('description_ar') . '</p>' : '' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description_en') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="description_en">@lang('department.description_en') </label>
                    <div class="col-sm-7">
                        <textarea name="description_en" placeholder="@lang('department.description_en')" id="description_en" class="form-control"></textarea>
                        {!! $errors->has('description_en') ? '<p class="help-block">' . $errors->first('description_en') . '</p>' : '' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('image') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="image">@lang('department.image')
                        {{-- <br /><span><small class="help-text text-muted">{{ __('max_100_chars') }}</small></span> --}}
                    </label>
                    <div class="col-sm-7">
                        <input type="file" name="image" value="" placeholder="@lang('department.image')" id="image"
                            class="form-control">
                        {!! $errors->has('image') ? '<p class="help-block">' . $errors->first('image') . '</p>' : '' !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{__('products.create_product')}}</button>
                    </div>
                </div>
            </form>

        </div>

    {{-- </div> --}}


@endsection

