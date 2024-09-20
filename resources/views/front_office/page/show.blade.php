@extends('layouts.home')
@section('title')
<?php $lang = config('app.locale'); ?>
{{( $lang=='ar' ) ? $page->title_ar : $page->title_en}}
@endsection


@section('content')
<?php $lang = config('app.locale'); ?>
    <div class="blog-post-page-header bg-dark-blue  py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="mb-3">{{( $lang=='ar' ) ? $page->title_ar : $page->title_en}}</h1>
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
                            <img src="{{$page->thumbnail_url->image_lg}}" alt="{{ ( $lang=='ar' ) ? $page->title_ar : $page->title_en }}" class="img-fluid">
                        </div>
                    @endif

                    <div class="post-content">
                        {!! clean_html( ( $lang=='ar' ) ? $page->page_content_ar : $page->page_content_en) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
