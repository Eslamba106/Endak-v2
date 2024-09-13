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

    <div class="row">
        <div class="col-sm-12">

            <form action="{{ route('admin.pages.update' , $post->id) }}" method="post" id="createPostForm" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group row {{ $errors->has('title')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <label class="control-label">{{__('title')}} <em>*</em></label>
                        <input type="text" class="form-control" id="title" value="{{ old('title')?old('title'): $post->title }}" name="title" placeholder="{{__('title')}}">
                        {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('post_content')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <label class="control-label">{{__('post_content')}} <em>*</em></label>
                        <textarea name="post_content" id="post_content" class="form-control">{!!  old('post_content')? old('post_content'): $post->post_content !!}</textarea>
                        {!! $errors->has('post_content')? '<p class="help-block">'.$errors->first('post_content').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{__('update_page')}}</button>
                    </div>
                </div>
            </form>

        </div>

    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'post_content' );
    </script>
@endsection
