@extends('layouts.dashboard.dashboard')

{{-- @section('page-header-right')
    <a href="{{route('category_index')}}" class="btn btn-secondary btn-xl mr-1" data-toggle="tooltip" title="@lang('admin.categories')"> <i class="la la-folder-open"></i> </a>

    <button type="submit" form="form-category" class="btn btn-success btn-xl" data-toggle="tooltip" title="@lang('admin.save')"> <i class="la la-save"></i> </button>
@endsection --}}

@section('content')
<a href="{{route('admin.categories')}}" class="btn btn-secondary btn-xl mr-1" data-toggle="tooltip" title="@lang('category.categories')"> <i class="la la-folder-open"></i> </a>
<?php $lang = config('app.locale'); ?>
<button type="submit" form="form-category" class="btn btn-success btn-xl" data-toggle="tooltip" title="@lang('general.save')"> <i class="la la-save"></i> </button>
    <form action="" id="form-category" method="post" enctype="multipart/form-data"> 
        @csrf

        {{-- <div class="row"> --}}

            <div class="col-md-12">

                <div class="form-group row {{ $errors->has('category_name_ar')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="category_name_ar">@lang('category.category_name_ar') <em>*</em></label>
                    <div class="col-sm-7">
                        <input type="text" name="category_name_ar" value="" placeholder="@lang('category.category_name_ar')" id="category_name_ar" class="form-control">
                        {!! $errors->has('category_name_ar')? '<p class="help-block">'.$errors->first('category_name_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('category_name_en')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="category_name_en">@lang('category.category_name_en') <em>*</em></label>
                    <div class="col-sm-7">
                        <input type="text" name="category_name_en" value="" placeholder="@lang('category.category_name_en')" id="category_name_en" class="form-control">
                        {!! $errors->has('category_name_en')? '<p class="help-block">'.$errors->first('category_name_en').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('parent')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="parent">@lang('category.parent') </label>
                    <div class="col-sm-7">
                        <select name="parent" id="parent" class="form-control select2">
                            <option value="0">@lang('category.main')</option>
                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {!! ($lang == "ar") ? $category->category_name_ar : $category->category_name_en !!} </option>
                                    @foreach($category->sub_categories as $subCategory)
                                        <option value="{{$subCategory->id}}"> &nbsp;&nbsp;&nbsp; &raquo; {!! ($lang == "ar") ? $subCategory->category_name_ar :$subCategory->category_name_en !!} </option>
                                    @endforeach
                                @endforeach
                            @endif
                        </select>

                        {!! $errors->has('parent')? '<p class="help-block">'.$errors->first('parent').'</p>':'' !!}
                    </div>
                </div>



                <div class="form-group row {{ $errors->has('title_ar')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="title_ar">@lang('category.title_ar') 
                        <br /><span><small class="help-text text-muted">{{ __('max_100_chars') }}</small></span>
                    </label>
                    <div class="col-sm-7">
                        <input type="text" name="title_ar" value="" placeholder="@lang('category.title_ar')" id="title_ar" class="form-control">
                        {!! $errors->has('title_ar')? '<p class="help-block">'.$errors->first('title_ar').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('title_en')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="title_en">@lang('category.title_en') 
                        <br /><span><small class="help-text text-muted">{{ __('max_100_chars') }}</small></span>
                    </label>
                    <div class="col-sm-7">
                        <input type="text" name="title_en" value="" placeholder="@lang('category.title_en')" id="title_en" class="form-control">
                        {!! $errors->has('title_en')? '<p class="help-block">'.$errors->first('title_en').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description_ar')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="description_ar">@lang('category.description_ar') </label>
                    <div class="col-sm-7">
                        <textarea name="description_ar" placeholder="@lang('category.description_ar')" id="description_ar" class="form-control"></textarea>
                        {!! $errors->has('description_ar')? '<p class="help-block">'.$errors->first('description_ar').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description_en')? 'has-error':'' }} ">
                    <label class="col-sm-3 control-label" for="description_en">@lang('category.description_en') </label>
                    <div class="col-sm-7">
                        <textarea name="description_en" placeholder="@lang('category.description_en')" id="description_en" class="form-control"></textarea>
                        {!! $errors->has('description_en')? '<p class="help-block">'.$errors->first('description_en').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="status">@lang('category.status')</label>
                    <div class="col-sm-7">
                        <label><input type="radio" name="status" value="1" checked="checked"> {{__('publish')}}</label> <br />
                        <label><input type="radio" name="status" value="0"> {{__('unpublish')}}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-7 offset-3">
                        <button type="submit" form="form-category" class="btn btn-success btn-xl" data-toggle="tooltip" title="@lang('general.save')"> <i class="la la-save"></i> {{__('save')}} </button>
                    </div>
                </div>


            {{-- </div> --}}

        </div>

    </form>

@endsection

@section('page-js')
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
