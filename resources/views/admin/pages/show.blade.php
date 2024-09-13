@extends('layouts.dashboard.dashboard')
@section('title')
{{ __('page.pages') }}
@endsection

@section('page_name')
{{ __('page.create_page') }}
@endsection

@section('content')

    <div class="blog-post-page-header bg-dark-blue  py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="mb-3">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="blog-post-container-wrap py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if($page->feature_image)
                        <div class="post-feature-image-wrap mb-5">
                            <img src="{{$page->thumbnail_url->image_lg}}" alt="{{$page->title}}" class="img-fluid">
                        </div>
                    @endif

                    <div class="post-content">
                        {!! clean_html($page->page_content) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
