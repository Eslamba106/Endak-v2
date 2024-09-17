@extends('layouts.dashboard.dashboard')
@section('title')
{{ __('page.pages') }}
@endsection

@section('page_name')
{{ __('page.create_page') }}
@endsection

{{-- @extends('layouts.admin')

@section('page-header-right')
    <a href="{{route('create_page')}}" class="btn btn-success mr-3" data-toggle="tooltip" title="{{__('create_new_page')}}"> <i class="la la-plus-circle"></i> {{__('create_new_page')}} </a>

    <a href="{{route('pages')}}" class="btn btn-info" data-toggle="tooltip" title="{{__('pages')}}"> <i class="la la-list"></i> {{__('pages')}} </a>

@endsection --}}

@section('content')

    {{-- <div class="row"> --}}
        <div class="col-sm-12">

            <form action="{{ route('admin.pages.update' , $post->id) }}" method="post" id="createPostForm" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group row {{ $errors->has('title_ar')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <label class="control-label">{{__('category.title_ar')}} <em>*</em></label>
                        <input type="text" class="form-control" id="title_ar" value="{{ old('title_ar')?old('title_ar'): $post->title_ar }}" name="title_ar" placeholder="{{__('category.title_ar')}}">
                        {!! $errors->has('title_ar')? '<p class="help-block">'.$errors->first('title_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('title_en')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <label class="control-label">{{__('category.title_en')}} <em>*</em></label>
                        <input type="text" class="form-control" id="title_en" value="{{ old('title_en')?old('title_en'): $post->title_en }}" name="title_en" placeholder="{{__('category.title_en')}}">
                        {!! $errors->has('title_en')? '<p class="help-block">'.$errors->first('title_en').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('post_content_ar')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <label class="control-label">{{__('page.page_content_ar')}} <em>*</em></label>
                        <textarea name="page_content_ar" id="post_content" class="form-control">{!!  old('page_content_ar')? old('page_content_ar'): $post->page_content_ar !!}</textarea>
                        {!! $errors->has('page_content_ar')? '<p class="help-block">'.$errors->first('page_content_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('page_content_en')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <label class="control-label">{{__('page.page_content_en')}} <em>*</em></label>
                        <textarea name="page_content_en" id="post_content_en" class="form-control">{!!  old('page_content_en')? old('page_content_en'): $post->page_content_en !!}</textarea>
                        {!! $errors->has('page_content_en')? '<p class="help-block">'.$errors->first('page_content_en').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{__('page.update_page')}}</button>
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
        CKEDITOR.replace( 'post_content' );
    </script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'post_content_en' );
    </script>
@endsection
