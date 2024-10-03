@extends('layouts.dashboard.dashboard')
@section('title')
{{ __('products.edit') }}
@endsection

@section('page_name')
{{ __('products.edit') }}
@endsection

{{-- @extends('layouts.admin')

@section('page-header-right')
    <a href="{{route('create_page')}}" class="btn btn-success mr-3" data-toggle="tooltip" title="{{__('create_new_page')}}"> <i class="la la-plus-circle"></i> {{__('create_new_page')}} </a>

    <a href="{{route('pages')}}" class="btn btn-info" data-toggle="tooltip" title="{{__('pages')}}"> <i class="la la-list"></i> {{__('pages')}} </a>

@endsection --}}

@section('content')

    {{-- <div class="row"> --}}
        <div class="col-sm-12">
            <form action="{{ route('admin.products.update' , $product->slug) }}" method="post" id="createproductForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group row {{ $errors->has('name_ar') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="department_name">@lang('department.name_ar') <em>*</em></label>
                    <div class="col-sm-7">
                        <input type="text" name="name_ar"  placeholder="@lang('department.name_ar')" value="{{ $product->name_ar }}"
                            class="form-control">
                        {!! $errors->has('name_ar') ? '<p class="help-block">' . $errors->first('name_ar') . '</p>' : '' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('name_en') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="department_name_en">@lang('department.name_en') <em>*</em></label>
                    <div class="col-sm-7">
                        <input type="text" name="name_en"  placeholder="@lang('department.name_en')" value="{{ old('name_en')?old('name_en'): $product->name_en }}"
                             class="form-control">
                        {!! $errors->has('name_en') ? '<p class="help-block">' . $errors->first('name_en') . '</p>' : '' !!}
                    </div>
                </div>
                {{-- {{ dd($product->description_ar) }} --}}
                <div class="form-group row {{ $errors->has('description_ar') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="description_ar">@lang('department.description_ar') </label>
                    <div class="col-sm-7">
                        <textarea name="description_ar" placeholder="@lang('department.description_ar')"  value="" class="form-control">{{  $product->description_ar }}</textarea>
                        {!! $errors->has('description_ar') ? '<p class="help-block">' . $errors->first('description_ar') . '</p>' : '' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description_en') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="description_en">@lang('department.description_en') </label>
                    <div class="col-sm-7">
                        <textarea name="description_en" placeholder="@lang('department.description_en')"  value="" class="form-control">{{ $product->description_en }}</textarea>
                        {!! $errors->has('description_en') ? '<p class="help-block">' . $errors->first('description_en') . '</p>' : '' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('image') ? 'has-error' : '' }} ">
                    <label class="col-sm-3 control-label" for="image">@lang('department.image')
                    </label>
                    <div class="col-sm-7">
                        <input type="file" name="image"  placeholder="@lang('department.image')" id="image"
                            class="form-control">
                        {!! $errors->has('image') ? '<p class="help-block">' . $errors->first('image') . '</p>' : '' !!}
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{__('products.update')}}</button>
                    </div>
                </div>
            </form>

        {{-- </div> --}}

    </div>

@endsection

@section('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'product_content' );
    </script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'product_content_en' );
    </script>
@endsection
