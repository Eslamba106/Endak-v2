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

    <div class="row">
        <div class="col-sm-12">

            <form action="{{ route('admin.pages.store') }}" method="post" id="createPostForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group row {{ $errors->has('title')? 'has-error':'' }}">
                    <div class="col-sm-12">
                         <label class="control-label">{{__('title')}} <em>*</em></label>
                        <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title" placeholder="{{__('title')}}">
                        {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('page_content')? 'has-error':'' }}">
                    <div class="col-sm-12">
                         <label class="control-label">{{__('page_content')}} <em>*</em></label>
                        <textarea name="page_content" id="page_content" class="form-control" rows="6">{{ old('page_content') }}</textarea>
                        {!! $errors->has('page_content')? '<p class="help-block">'.$errors->first('page_content').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{__('page.page_create')}}</button>
                    </div>
                </div>
            </form>

        </div>

    </div>


@endsection

@section('js')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'page_content' );
    </script>
@endsection