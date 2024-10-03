@extends('layouts.dashboard.dashboard')
@section('title')
{{ __('page.pages') }}
@endsection

@section('page_name')
{{ __('page.create_page') }}
@endsection

{{-- @section('page-header-right')
    <a href="{{route('pages')}}" class="btn btn-info" data-toggle="tooltip" title="{{ __('pages') }}"> <i class="la la-list"></i> {{ __('pages')}} </a>
@endsection --}}


@section('content')

    {{-- <div class="row"> --}}
        <div class="col-sm-12">

            <form action="{{ route('admin.pages.store') }}" method="post" id="createPostForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group row {{ $errors->has('title_ar')? 'has-error':'' }}">
                    <div class="col-sm-12">
                         <label class="control-label">{{__('category.title_ar')}} <em>*</em></label>
                        <input type="text" class="form-control" id="title_ar" value="{{ old('title_ar') }}" name="title_ar" placeholder="{{__('category.title_ar')}}">
                        {!! $errors->has('title_ar')? '<p class="help-block">'.$errors->first('title_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('title_en')? 'has-error':'' }}">
                    <div class="col-sm-12">
                         <label class="control-label">{{__('category.title_en')}} <em>*</em></label>
                        <input type="text" class="form-control" id="title_en" value="{{ old('title_en') }}" name="title_en" placeholder="{{__('category.title_en')}}">
                        {!! $errors->has('title_en')? '<p class="help-block">'.$errors->first('title_en').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('page_content_ar')? 'has-error':'' }}">
                    <div class="col-sm-12">
                         <label class="control-label">{{__('page.page_content_ar')}} <em>*</em></label>
                        <textarea name="page_content_ar" id="page_content" class="form-control" rows="6">{{ old('page_content_ar') }}</textarea>
                        {!! $errors->has('page_content_ar')? '<p class="help-block">'.$errors->first('page_content_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('page_content_en')? 'has-error':'' }}">
                    <div class="col-sm-12">
                         <label class="control-label">{{__('page.page_content_en')}} <em>*</em></label>
                        <textarea name="page_content_en" id="page_content_en" class="form-control" rows="6">{{ old('page_content_en') }}</textarea>
                        {!! $errors->has('page_content_en')? '<p class="help-block">'.$errors->first('page_content_en').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{__('page.page_create')}}</button>
                    </div>
                </div>
            </form>

        </div>

    {{-- </div> --}}


@endsection

@section('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'page_content' );
    </script>
    <script>
        CKEDITOR.replace( 'page_content_en' );
    </script>
@endsection