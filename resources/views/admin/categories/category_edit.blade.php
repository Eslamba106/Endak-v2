@extends('layouts.dashboard.dashboard')
@section('title')
{{ __('category.category_edit') }}
@endsection

@section('page_name')
{{ __('category.category_edit') }}
@endsection
@section('content')
<?php $lang = config('app.locale'); ?>
    {{-- <div class="row"> --}}
        <div class="col-md-12">

            <form action="" id="form-category" method="post" enctype="multipart/form-data"> @csrf

                <div class="form-group row {{ $errors->has('category_name_ar')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="category_name_ar">@lang('admin.category_name_ar')<em>*</em></label>
                    <div class="col-sm-7">
                        <input type="text" name="category_name_ar" value="{{$category->category_name_ar}}" placeholder="@lang('admin.category_name_ar')" id="category_name" class="form-control">
                        {!! $errors->has('category_name_ar')? '<p class="help-block">'.$errors->first('category_name_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('category_name_en')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="category_name_en">@lang('admin.category_name_en')<em>*</em></label>
                    <div class="col-sm-7">
                        <input type="text" name="category_name_en" value="{{$category->category_name_en}}" placeholder="@lang('admin.category_name_en')" id="category_name" class="form-control">
                        {!! $errors->has('category_name_en')? '<p class="help-block">'.$errors->first('category_name_en').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('parent')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="parent">@lang('admin.parent')</label>
                    <div class="col-sm-7">
                        <select name="parent" id="parent" class="form-control select2">
                            <option value="0">@lang('admin.select_category')</option>
                            @if($categories->count() > 0)
                                @foreach($categories as $parent)
                                    <option value="{{$parent->id}}" {{selected($category->category_id, $parent->id)}} > {{ ($lang == 'en') ? $parent->category_name_en : $parent->category_name_ar }} </option>

                                    @foreach($parent->sub_categories as $subCategory)
                                        <option value="{{$subCategory->id}}" {{selected($category->category_id, $subCategory->id)}} > &nbsp;&nbsp;&nbsp; &raquo; {!! ($lang == 'en') ? $subCategory->category_name_en : $subCategory->category_name_ar !!} </option>
                                    @endforeach

                                @endforeach
                            @endif
                        </select>

                        {!! $errors->has('parent')? '<p class="help-block">'.$errors->first('parent').'</p>':'' !!}
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <label class="col-sm-3 control-label">{{__('select_icon')}}</label>
                    <div class="col-sm-7">
                        <select class="form-control select2icon" name="icon_class">
                            <option value="0">{{__('select_icon')}}</option>
                            @foreach(icon_classes() as $icon => $val)
                                <option value="{{$icon}}" {{selected($icon, $category->icon_class)}} data-icon="{{$icon}}">{{$icon}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="form-group row {{ $errors->has('category_image')? 'has-error':'' }} image-container-row">
                    <label class="col-sm-3 control-label">{{__('image')}} <em>*</em></label>
                    <div class="col-sm-7">
                        {!! image_upload_form('category_image', $category->category_image, [750,422]) !!}
                        {!! $errors->has('category_image')? '<p class="help-block">'.$errors->first('category_image').'</p>':'' !!}
                    </div>
                </div> --}}

                <div class="form-group row {{ $errors->has('title_ar')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="title_ar">@lang('admin.title_ar') 
                        <br /><span><small class="help-text text-muted">{{ __('max_100_chars') }}</small></span>
                    </label>
                    <div class="col-sm-7">
                        <input type="text" name="title_ar" value="{{ ($category->title_ar) ? $category->title_ar : '' }}" placeholder="@lang('admin.title_ar')" id="title_ar" class="form-control">
                        {!! $errors->has('title_ar')? '<p class="help-block">'.$errors->first('title_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('title_en')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="title_en">@lang('admin.title_en') 
                        <br /><span><small class="help-text text-muted">{{ __('max_100_chars') }}</small></span>
                    </label>
                    <div class="col-sm-7">
                        <input type="text" name="title_en" value="{{ ($category->title_en) ? $category->title_en : '' }}" placeholder="@lang('admin.title_en')" id="title_en" class="form-control">
                        {!! $errors->has('title_en')? '<p class="help-block">'.$errors->first('title_en').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description_ar')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="description_ar">@lang('admin.description_ar') </label>
                    <div class="col-sm-7">
                        <textarea name="description_ar" placeholder="@lang('admin.description_ar')" id="description_ar" class="form-control">{{ ($category->description_ar) ? $category->description_ar : '' }}</textarea>
                        {!! $errors->has('description_ar')? '<p class="help-block">'.$errors->first('description_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description_en')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="description_en">@lang('admin.description_en') </label>
                    <div class="col-sm-7">
                        <textarea name="description_en" placeholder="@lang('admin.description_en')" id="description_en" class="form-control">{{ ($category->description_en) ? $category->description_en : '' }}</textarea>
                        {!! $errors->has('description_en')? '<p class="help-block">'.$errors->first('description_en').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">@lang('admin.status')</label>
                    <div class="col-sm-7">
                        <label><input type="radio" name="status" value="1" @if($category->status == 1)checked="checked" @endif> {{__('publish')}}</label> <br />
                        <label><input type="radio" name="status" value="0"  @if($category->status == 0)checked="checked" @endif> {{__('unpublish')}}</label>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-7 offset-3">
                        <button type="submit" form="form-category" class="btn btn-success btn-xl" data-toggle="tooltip" title="@lang('admin.save')"> <i class="la la-save"></i> {{__('save')}} </button>
                    </div>
                </div>

            </form>


        {{-- </div> --}}


    </div>



@endsection

@section('js')
    <script type="text/javascript">
        $(document).on('change', '#parent', function(e) {
            if($(this).val()!=0) {
                $('.image-container-row').hide();
                $('#category_image').val(0);
            } else {
                $('.image-container-row').show();
            }
        });
        $('#parent').trigger('change');
    </script>
@endsection